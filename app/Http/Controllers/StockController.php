<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Item;
use App\ItemStock;
use App\StockReport;
use App\Supplier;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Session;

class StockController extends Controller
{
    public function AllItem(){
        $st = Item::all();
        return view('stock.item', compact('st'));
    }
    public function ItemGet($id){
        $emp = Item::find($id);
        return Response()->json([
            "m" => "items",
            "ms" => $emp,
        ]);

    }
    public function ItemDelete($id){
        Item::destroy($id);
        return "success";

    }
    public function ItemStatus($id){
        $emp = Item::find($id);
        if ($emp->item_status == 1){
            $emp->item_status = 0;
            $st = 0;
        }
        else{
            $st = 1;
            $emp->item_status = 1;

        }
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $st,
        ]);

        }
    public function AddItem(Request $request){
        $emp = new Item();
        $emp->item_status = 0;
        $emp->item_name = $request->input('item_name');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteItem(Request $request){
        $emp = Item::find($request->input('id4update'));

        Item::where('id',$request->input('id4update'))->update([
            'item_name'=>$request->input('item_name'),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }



    public function AllStock(){
        $st = Item::all();
        $sp =Supplier::all();
        $ss = ItemStock::orderBy('id', 'DESC')->get();;
        return view('stock.all-item', compact('st','sp','ss'));
    }
    public function StockGet($id){
        $emp = ItemStock::find($id);
        return Response()->json([
            "m" => "itemstock",
            "ms" => $emp,
        ]);

    }
    public function StockDelete($id){
        Item::destroy($id);
        return "success";

    }
    public function StockStatus($id){
        $emp = ItemStock::find($id);
        if ($emp->item_s == 1){
            $emp->item_s = 0;
        }
        else{
            $emp->item_s = 1;

        }
        $emp->save();
        return "Success";

    }
    public function AddStock(Request $request){
        $emp = new ItemStock();
        $id = rand(100000,999999);
        $emp->item_name = $request->input('item_name');
        $emp->item_sup = $request->input('sup_name');
        $emp->item_q = $request->input('item_q');
        $emp->item_p = $request->input('item_p');

         if ($request->input('item_p_p') != null){
             $ex = new Expense();
            $emp->item_d = $request->input('item_p')-$request->input('item_p_p');
             if($request->input('item_p') <= $request->input('item_p_p')){
                 $emp->item_d = 0;
                 $ex->ex_amount = $request->input('item_p');
                 $emp->item_s = 1;
             }
             else{
                 $emp->item_d = $request->input('item_p')-$request->input('item_p_p');
                 $ex->ex_amount = $request->input('item_p_p');
                 $emp->item_s = 2;
             }


             $ex->ex_name =  "Purses :".$request->input('item_name');
             $ex->ex_by =  Session::get('emp_name');
             $ex->ex_type =  0;
             $ex->ex_month = Carbon::now()->format('m');
             $ex->ex_year =  Carbon::now()->format('Y');
             $ex->ex_id = $id;
             $ex->save();

        }
        else{
            $emp->item_d = $request->input('item_p');
            $emp->item_s = 0;
        }

        $pp = StockReport::where('s_name',$request->input('item_name'))->first();

        if ($pp){
            $r = ($pp->s_q + ($request->input('item_q')*1000));
            StockReport::where('s_name',$request->input('item_name'))->update([
                's_q' => $r,
            ]);
        }
        else{
            $tt = new StockReport();
            $tt->s_name = $request->input('item_name');
            $tt->s_q = ($request->input('item_q')*1000);
            $tt->s_u = 0;
            $tt->save();
        }
        $emp->item_id = $id;
      $emp->save();


    return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteStock(Request $request){
        $emp = ItemStock::find($request->input('id4update'));

        if ($request->input('item_p') != $emp->item_p){
            if ($emp->item_s == 2){
                $pay =  $emp->item_p - $emp->item_d;
                $newd = $request->input('item_p') - $pay;
                if ($newd < 0){
                    $n = 0 - $newd;
                    ItemStock::where('id',$request->input('id4update'))->update([
                        'item_d' => $n,
                        'item_p' => $request->input('item_p'),
                        'item_s' => 1,
                    ]);

                    Expense::where('ex_id', $emp->item_id)->update([
                        'ex_amount' => $request->input('item_p'),
                    ]);
                }else{

                if ($request->input('item_p') > $emp->item_p){


                   ItemStock::where('id',$request->input('id4update'))->update([
                        'item_d' => $newd,
                        'item_p' => $request->input('item_p'),
                    ]);
                }

                elseif ($request->input('item_p') < $emp->item_p && $request->input('item_p') != $emp->item_d){

                    if ($newd == 0){
                      ItemStock::where('id',$request->input('id4update'))->update([
                            'item_d' => $newd,
                            'item_s' => 1,
                            'item_p' => $request->input('item_p'),
                        ]);
                    }
                    else{
                       ItemStock::where('id',$request->input('id4update'))->update([
                            'item_d' => $newd,
                            'item_p' => $request->input('item_p'),
                        ]);
                    }

                }
                }
           }


            elseif ($emp->item_s == 1){
                $pay = $emp->item_p;
                $newd = $request->input('item_p') - $pay;
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => $newd,
                    'item_s' => 2,
                    'item_p' => $request->input('item_p'),
                ]);

            }

            else{
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => $request->input('item_p'),
                    'item_p' => $request->input('item_p'),
                ]);
            }
        }


        if ($request->input('item_p_d') !=null && $emp->item_s == 1){
            $refund = $emp->item_d - $request->input('item_p_d');

            if ($request->input('item_p_d') >= $emp->item_d){
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => 0,
                ]);
            }
            else{
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => $refund,
                ]);
            }
        }


        if ($request->input('item_p_p') > 0){

            if ($emp->item_s == 0){
                $ex = new Expense();
                $ex->ex_id = $emp->item_id;
                $ex->ex_name =  "Purses :".$emp->item_name;
                $ex->ex_by = Session::get('emp_name');
                $ex->ex_type =  0;
                $ex->ex_month = Carbon::now()->format('m');
                $ex->ex_year =  Carbon::now()->format('Y');
                if ($emp->item_d <= $request->input('item_p_p')){

                    ItemStock::where('id',$request->input('id4update'))->update([
                        'item_d' => 0,
                        'item_s' => 1,
                    ]);

                    $ex->ex_amount =  $emp->item_p;
                }
               else{
                   $due = $emp->item_p - $request->input('item_p_p');
                   ItemStock::where('id',$request->input('id4update'))->update([
                       'item_d' => $due,
                       'item_s' => 2,
                   ]);
                   $ex->ex_amount =  $request->input('item_p_p');

               }
              $ex->save();
            }else{
            if ($request->input('item_p_p') >= $emp->item_d){
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => 0,
                    'item_s' => 1,
                ]);
                Expense::where('ex_id', $emp->item_id)->update([
                    'ex_amount' => $emp->item_p,
                ]);

            }else{
                $newd = $emp->item_d - $request->input('item_p_p');
                $newex = ($emp->item_p - $emp->item_d)+$request->input('item_p_p');
                ItemStock::where('id',$request->input('id4update'))->update([
                    'item_d' => $newd,
                    'item_s' => 2,
                ]);
                Expense::where('ex_id', $emp->item_id)->update([
                    'ex_amount' => $newex,
                ]);
            }
            }
        }


        ItemStock::where('id',$request->input('id4update'))->update([
            'item_name' => $request->input('item_name'),
            'item_sup' => $request->input('sup_name'),
            'item_q' => $request->input('item_q'),
        ]);
        Expense::where('ex_id', $emp->item_id)->update([
            'ex_name' => "Purses :".$request->input('item_name'),
        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }

    public function AllDetails(){
        $st = StockReport::all();
        return view('stock.all-stock', compact('st'));
    }
    public function StockDetails($id){
        $st = ItemStock::where('item_id',$id)->get();
        return view('stock.stock-details', compact('st'));
    }
    public function StockSupDetails($id){
        $st = ItemStock::where('item_sup',$id)->get();
        $sup = Supplier:: where('splr_name',$id)->first();
        return view('stock.stock-sup-details', compact('st','sup'));
    }
}
