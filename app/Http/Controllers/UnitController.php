<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    public function UnitGet($id){
        $emp = Unit::find($id);
        return Response()->json([
            "m" => "units",
            "ms" => $emp,
        ]);

    }
    public function UnitDelete($id){
        Unit::destroy($id);
        return "success";

    }
    public function UnitStatus($id){
        $emp = Unit::find($id);
        if ($emp->unit_status == 1){
            $emp->unit_status = 0;
            $st = 0;
        }
        else{
            $emp->unit_status = 1;
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
    public function AllUnit(){
        $emp  = Unit::get();
        return view('unit.all-unit',compact('emp'));
    }
    public function AddUnit(Request $request){
        $emp = new Unit();
        $emp->unit_status = 0;
        $emp->unit_name = $request->input('unit_name');
        $emp->unit_val = $request->input('unit_value');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteUnit(Request $request){
        $emp = Unit::find($request->input('id4update'));

        Unit::where('id',$request->input('id4update'))->update([
            'unit_name'=>$request->input('unit_name'),
            'unit_val'=>$request->input('unit_value'),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
