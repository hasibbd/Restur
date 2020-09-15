<?php

namespace App\Http\Controllers;

use App\Vat;
use Illuminate\Http\Request;

class VatController extends Controller
{
    public function VatGet($id){
        $emp = Vat::find($id);
        return Response()->json([
            "m" => "vats",
            "ms" => $emp,
        ]);

    }
    public function VatDelete($id){
        Vat::destroy($id);
        return "success";

    }
    public function VatStatus($id){
        $emp = Vat::find($id);
        if ($emp->vat_status == 1){
            $st = 0;
            $emp->vat_status = 0;
        }
        else{

            $emp->vat_status = 1;
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
    public function AllVat(){
        $emp  = Vat::get();
        return view('vat.vat',compact('emp'));
    }
    public function AddVat(Request $request){
        $emp = new Vat();
        $emp->vat_status = 0;
        $emp->vat_name = $request->input('vat_name');
        $emp->vat_price = $request->input('vat_price');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteVat(Request $request){
        $emp = Vat::find($request->input('id4update'));

        Vat::where('id',$request->input('id4update'))->update([
            'vat_name'=>$request->input('vat_name'),
            'vat_price'=>$request->input('vat_price'),
        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
