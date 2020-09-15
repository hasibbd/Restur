<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Income;
use App\Order;
use App\Payment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function PayAdd(Request $request){
        $p = new Payment();
        $p->order_id = $request->input('orderid');
        $p->price = $request->input('price');
        $p->vat = $request->input('vat');
        $p->discount = $request->input('discount');
        $p->grand_price = $request->input('grand_price');
        $p->pay_status = $request->input('p_state');
        $p->pay_price = $request->input('p_price');
        $p->save();
        if ($request->input('p_state') == 1){
            $o = Order::where('order_id',$request->input('orderid'))->first();
            $emp = Employee::where('emp_name',$o->order_by)->first();
            $dat=Carbon::now();
            $in = new Income();
            $in->or_id = $request->input('orderid');
            $in->or_by = $emp->emp_id;
            $in->or_price = $request->input('price');
            $in->or_vat = $request->input('vat');
            $in->or_discount = $request->input('discount');
            $in->or_grand_price = $request->input('grand_price');
             $in->or_month = $dat->format("m");
              $in->or_year = $dat->format("Y");
            $in->or_status = 1;
              $in->save();
        }
return  $request->input('orderid');;
    }
    public function PayAfter($id){
       Payment::where('id', $id)->update([
            'pay_status' => 1,
           'pay_price' =>0,
        ]);

        $p = Payment::find($id);
        $o = Order::where('order_id',$p->order_id)->first();
        $emp = Employee::where('emp_name',$o->order_by)->first();
        $dat=Carbon::now();
        $in = new Income();
        $in->or_id = $p->order_id;
        $in->or_by = $emp->emp_id;
        $in->or_price = $p->price;
        $in->or_vat = $p->vat;
        $in->or_discount = $p->discount;
        $in->or_grand_price = $p->grand_price;
        $in->or_month = $dat->format("m");
        $in->or_year = $dat->format("Y");
        $in->or_status = 1;
        $in->save();
   return back();
    }
}
