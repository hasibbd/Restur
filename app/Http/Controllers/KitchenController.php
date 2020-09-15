<?php

namespace App\Http\Controllers;

use App\KitechenOrder;
use App\Order;
use App\Recipe;
use App\StockReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
use Carbon\Carbon;
class KitchenController extends Controller
{
    public function Kitchen()
    {
        $e = Order::where('dish_status', 0)->get();
        $eee = Order::where('dish_status', 5)->get();

        $oncook  = DB::table('orders')
            ->where('ki_by',Session::get('emp_id'))
            ->join('kitechen_orders', 'orders.order_id','=','kitechen_orders.or_id')
            ->get();



        return view('kitchen.kitchen', compact('e','eee','oncook'));




    }


    public function KitchenChange($id)
    {
        $or = Order::where('order_id', $id)->get();
        $o = new KitechenOrder();
        $o->ki_by = Session::get('emp_id');
        $o->or_id = $id;

        foreach ($or as $r){

echo $r->dish_status;
            if ($r->dish_status == 0) {
                Order::where('order_id', $id)->update([
                    'dish_status' => 1,
                ]);
               $o->save();
                $d_q = $r->dish_q;
                $l = Recipe::where('d_name', $r->dish_name)->get();
                $z = StockReport::get();
                foreach ($l as $ll) {
                    foreach ($z as $zz) {
                        if ($ll->i_name == $zz->s_name) {
                            if ($zz->s_u == 0) {
                                $c = $ll->i_q * $d_q;
                                StockReport::where('s_name', $ll->i_name)->update([
                                    's_u' => $c,
                                ]);
                            } else {
                                $c = $zz->s_u + $ll->i_q * $d_q;
                                StockReport::where('s_name', $ll->i_name)->update([
                                    's_u' => $c,
                                ]);
                            }
                        }
                    }
                }
            } elseif ($r->dish_status == 5) {
                Order::where('order_id', $id)->update([
                    'dish_status' => 6,
                ]);

                $d_q = $r->dish_q;
                $l = Recipe::where('d_name', $r->dish_name)->get();
                $z = StockReport::get();
                foreach ($l as $ll) {
                    foreach ($z as $zz) {
                        if ($ll->i_name == $zz->s_name) {
                            $c = $zz->s_u - $ll->i_q * $d_q;
                            StockReport::where('s_name', $ll->i_name)->update([
                                's_u' => $c,
                            ]);
                        }
                    }
                }
            } elseif($r->dish_status == 1) {
                Order::where('order_id', $id)->update([
                    'dish_status' => 2,
                ]);
            }
            else{

                Order::where('order_id', $id)->update([
                    'dish_status' => 3,
                ]);
            }
        }
        return back();
    }

    public function KitchenAd($id){

        if ($id == 1){
            $data = Order::whereMonth('created_at', Carbon::now()->month)->get();
        }
        elseif ($id == 2){
            $data = Order::whereMonth('created_at', Carbon::now()->month)->whereNotIn('dish_status', array(0, 1, 2, 6))->get();

        }
        elseif ($id == 3){
            $data = Order::whereMonth('created_at', Carbon::now()->month)->whereNotIn('dish_status', array(0, 6, 9))->get();
        }
        elseif ($id == 4){
            $data = Order::whereMonth('created_at', Carbon::now()->month)->whereNotIn('dish_status', array(0, 1, 3, 9))->get();
        }
        return view('admin.kitchen',compact('data'));
    }
}
