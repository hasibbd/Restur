<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeStatus;
use App\Table;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function TableGet($id){
        $emp = Table::find($id);
        return Response()->json([
            "m" => "tables",
            "ms" => $emp,
        ]);

    }
    public function TableDelete($id){
        Table::destroy($id);
        return "success";

    }
    public function TableStatus($id){
        $emp = Table::find($id);
        if ($emp->tbl_status == 1){
            $emp->tbl_status = 0;
            $st = 0;
        }
        else{
            $emp->tbl_status = 1;
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
    public function AllTable(){
        $tbl  = Table::get();
        return view('table.all-table',compact('tbl'));
    }
    public function AddTable(Request $request){
        $emp = new Table();
        $emp->tbl_status = 0;
        $emp->tbl_name = $request->input('tbl_name');
        $emp->tbl_capacity = $request->input('tbl_capacity');
        $emp->save();
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function UpadteTable(Request $request){
        $emp = Table::find($request->input('id4update'));

        Table::where('id',$request->input('id4update'))->update([
            'tbl_name'=>$request->input('tbl_name'),
            'tbl_capacity'=>$request->input('tbl_capacity'),

        ]);

        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
