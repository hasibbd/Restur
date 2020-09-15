<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Income;
use App\Order;
use App\Payment;
use App\Recipe;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class OrderController extends Controller
{
    public function OrderDish()
    {
        $table = Table::where('tbl_status',1)->get();
        $dish = DB::table('dishes')->join('products', 'dishes.dish_type', '=', 'products.pdt_name')->where('dish_status',1)->get();
        return view('order.add-order', compact('dish', 'table'));
    }

    public function OrderDishadd(Request $request)
    {
        $data = $request->json()->all();
        return $data;
    }

    public function DishType($id)
    {
        $s = DB::table('dishes')->where('dish_type', $id)->get();
        return $s;
    }

    public function DishInfo($id)
    {
        $s = DB::table('dishes')->where('dish_name', $id)->get();
        return $s;
    }

    public function OrderAdd(Request $request)
    {
        $o = new Order();
        $q = Order::where('order_id', $request->input('orderid'))->where('dish_name', $request->input('name'))->where('dish_type', $request->input('type'))->first();
        $o->order_by = Session::get('emp_name');
        $o->order_id = $request->input('orderid');
        $o->order_tbl = $request->input('tbl');
        $o->dish_name = $request->input('name');
        $o->dish_type = $request->input('type');
        $o->dish_status = 0;
        if ($q) {
            $w = $request->input('qan') + $q->dish_q;
            Order::where('order_id', $request->input('orderid'))->where('dish_name', $request->input('name'))->where('dish_type', $request->input('type'))->update([
                'dish_q' => $w,
            ]);
        } else {
            $o->dish_q = $request->input('qan');
            $o->save();
        }
    }
    public function AllOrder(){
        if (Session::get('emp_type') == 1){
            $p  = DB::table('orders')->orderBy('orders.id', 'DESC')->join('payments', 'orders.order_id','=','payments.order_id')->join('employees', 'orders.order_by','=','employees.emp_name')->get();
        }
        else{
            $p  = DB::table('orders')->where('order_by',Session::get('emp_name'))->orderBy('orders.id', 'DESC')->join('payments', 'orders.order_id','=','payments.order_id')->join('employees', 'orders.order_by','=','employees.emp_name')->get();

        }
        return view('order.all-order',compact('p'));
        //  return view('login');
    }
    public function UnpaidOrder(){
        if (Session::get('emp_type') == 1){
            $p = DB::table('orders')->orderBy('orders.id', 'DESC')->join('payments', 'orders.order_id', '=', 'payments.order_id')->where('payments.pay_status', 0)->join('employees', 'orders.order_by','=','employees.emp_name')->get();
        }
        else {
            $p = DB::table('orders')->where('order_by', Session::get('emp_name'))->orderBy('orders.id', 'DESC')->join('payments', 'orders.order_id', '=', 'payments.order_id')->where('payments.pay_status', 0)->join('employees', 'orders.order_by','=','employees.emp_name')->get();

        } return view('order.unpaid-order',compact('p'));
        //  return view('login');
    }
    public function DetailsOrder($id){
        $o  = Order::where('order_id',$id)->get();
        $p = Payment::where('order_id',$id)->get();
        $d = Dish::get();
        return view('order.order-details',compact('p','o','d'));

    }
    public function GetOrder(){
        $o = Order::all();
        return $o;
    }

    public function OrderCancel($id){
      $w = Payment::where('order_id', '=', $id)->first();
      Income::where('or_id',$id)->update([
      'or_status' => 0,
      ]);
      if ($w->pay_status < 5){
          Order::where('order_id', '=', $id)->update([
              'dish_status' => 5,
          ]);
          Payment::where('order_id', '=', $id)->update([
              'pay_status' => 5,
          ]);
      }
        return back();
    }

    public function OrderDeliver($id){
        Order::where('order_id', '=', $id)->update([
            'dish_status' => 9,
        ]);
        return back();
    }

}
