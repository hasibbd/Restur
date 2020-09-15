<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Income;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tags\Example;
use Session;

class AccountingController extends Controller
{
    public function Income(){
        $ac = Income::where('or_status',1)->orderBy('or_year', 'desc')->orderBy('or_month', 'desc') ->get();
        return view('accounting.income2',compact('ac'));
    }
    public function Expense(){
        $ac = Expense::orderBy('ex_year', 'desc')->orderBy('ex_month', 'desc') ->get();
        $acc = Expense::orderBy('id', 'desc')->get();
        return view('accounting.expense',compact('ac','acc'));
    }
    public function AddExpense(Request $request){
        $ex = new Expense();
        $ex->ex_id = rand(100000,999999);
        $ex->ex_by = Session::get('emp_name');
        $ex->ex_name = $request->input('ex_name');
        $ex->ex_amount = $request->input('ex_price');
        $ex->ex_month = Carbon::now()->format('m');
        $ex->ex_year =  Carbon::now()->format('Y');
        $ex->ex_type = 1;
        $ex->save();
    }
    public function UpdateExpense(Request $request){
        $emp = Expense::find($request->input('id4update'));

        Expense::where('id',$request->input('id4update'))->update([
            'ex_name'=>$request->input('ex_name'),
            'ex_amount'=>$request->input('ex_price'),
            'ex_by'=>Session::get('emp_name'),

        ]);
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
    public function ExpenseGet($id){
        $emp = Expense::find($id);
        return Response()->json([
            "m" => "expenses",
            "ms" => $emp,
        ]);
    }

    public function ExpenseDetails($id){
            $st = Expense::where('ex_id',$id)->get();
            return view('accounting.expense-details', compact('st'));
    }
}
