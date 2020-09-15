<?php

namespace App\Http\Controllers;

use App\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{
    public function DiscountGet($id){
        $emp = Discount::find($id);
        return Response()->json([
            "m" => "discounts",
            "ms" => $emp,
        ]);

    }
    public function DiscountDelete($id){
        Discount::destroy($id);
        return "success";

    }
    public function DiscountStatus($id){
        $emp = Discount::find($id);
        if ($emp->discount_status == 1){
            $emp->discount_status = 0;
            $st = 0;
        }
        else{
            $emp->discount_status = 1;
            $st = 1;

        }
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $st,
        ]);

    }
    public function AllDiscount(){
        $emp  = Discount::get();
        return view('discount.discount',compact('emp'));
    }
    public function AddDiscount(Request $request){
        $emp = new Discount();
        $emp->discount_status = 0;
        $emp->discount_name = $request->input('discount_name');
        $emp->discount_price = $request->input('discount_price');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteDiscount(Request $request){
        $emp = Discount::find($request->input('id4update'));

        Discount::where('id',$request->input('id4update'))->update([
            'discount_name'=>$request->input('discount_name'),
            'discount_price'=>$request->input('discount_price'),
        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
