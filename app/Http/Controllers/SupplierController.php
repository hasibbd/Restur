<?php

namespace App\Http\Controllers;

use App\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function SupplierGet($id){
        $emp = Supplier::find($id);
        return Response()->json([
            "m" => "suppliers",
            "ms" => $emp,
        ]);

    }
    public function SupplierDelete($id){
        Supplier::destroy($id);
        return "success";

    }
    public function SupplierStatus($id){
        $emp = Supplier::find($id);
        if ($emp->splr_status == 1){
            $emp->splr_status = 0;
            $st = 0;
        }
        else{
            $st = 1;
            $emp->splr_status = 1;

        }
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $st,
        ]);

    }
    public function AllSupplier(){
        $splr  = Supplier::get();
        return view('supplier.all-Supplier',compact('splr'));
    }
    public function AddSupplier(Request $request){
        $emp = new Supplier();
        $emp->splr_status = 0;
        $emp->splr_name = $request->input('splr_name');
        $emp->splr_phone = $request->input('splr_phone');
        $emp->splr_email = $request->input('splr_email');
        $emp->splr_address = $request->input('splr_address');

        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteSupplier(Request $request){
        $emp = Supplier::find($request->input('id4update'));

        Supplier::where('id',$request->input('id4update'))->update([
            'splr_name'=>$request->input('splr_name'),
            'splr_phone'=>$request->input('splr_phone'),
            'splr_email'=>$request->input('splr_email'),
            'splr_address'=>$request->input('splr_address'),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
