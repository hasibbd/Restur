<?php

namespace App\Http\Controllers;

use App\Dish;
use App\Employee;
use App\Expense;
use App\Income;
use App\KitechenOrder;
use App\Order;
use App\Payment;
use App\StockReport;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;

class MyController extends Controller
{
    public function login(){
       $t = Dish::all();
       return view('fontpage.home',compact('t'));

    }
    public function loginID(){
        if (session()->exists('emp_name')){
            return redirect()->route('dash');
        }

        return view('login');
    }

    public function AllProduct(){
        return view('product.all-product');
    }
    public function loginCheckS(){

        $o = Order::whereDate('created_at',  date('Y-m-d'))->get();
        $w = Employee::where('emp_type',2)->get();
        $p = Payment::whereDate('created_at',  date('Y-m-d'))->where('pay_status',0)->sum('pay_price');
        $sp = Payment::whereDate('created_at',  date('Y-m-d'))->where('pay_status',">",0)->sum('grand_price');
        return view('admin.ad-dashboard',compact('o','p','sp','w'));
    }

    public function logOut(){
        $r =  Session::get('msg');
        Session::flush();
        return redirect()->route('login')->with('msg', $r);
    }

    public function Dashboard(){
        if (Session::get('emp_type') == 1){
            $orderwithpay  = DB::table('orders')
                ->join('payments', 'orders.order_id','=','payments.order_id')
                ->whereDate('orders.created_at',  date('Y-m-d'))
                ->get();
            $employee = Employee::where('emp_type',2)->get();
            $expense = Expense::whereDate('created_at',  date('Y-m-d'))->sum('ex_amount');
            $stock = StockReport::all();

            $t = Carbon::today()->format('m');
            $thisincome = Income::where('or_month',$t)->sum('or_grand_price');
            $thisexpense = Expense::where('ex_month',$t)->sum('ex_amount');
            $thisorder = Order::whereMonth('created_at', Carbon::now()->month)->count();
            $thiscan = Payment::whereMonth('created_at', Carbon::now()->month)->where('pay_status',5)->count();


            $kit  = DB::table('employees')
                ->join('kitechen_orders', 'employees.emp_id','=','kitechen_orders.ki_by')
                ->whereDate('kitechen_orders.created_at',  date('Y-m-d'))
                ->get();
            $kitemployee = Employee::where('emp_type',3)->get();


            return view('admin.ad-dashboard',compact('employee','stock','expense','orderwithpay','thisincome','thisexpense','thisorder','thiscan','kit','kitemployee'));
        }
        elseif (Session::get('emp_type') == 2){
            $orderwithpay  = DB::table('orders')
                ->whereDate('orders.created_at',  date('Y-m-d'))
                ->where('order_by',Session::get('emp_name'))
                ->join('payments', 'orders.order_id','=','payments.order_id')
                ->get();
            $kitchen = KitechenOrder::all();
            return view('admin.w-dashboard',compact('orderwithpay','kitchen'));
        }
        else{
            $orderwithpay  = DB::table('orders')
                ->where('ki_by',Session::get('emp_id'))
                ->whereDate('kitechen_orders.created_at',  date('Y-m-d'))
                ->join('payments', 'orders.order_id','=','payments.order_id')
                ->join('kitechen_orders', 'orders.order_id','=','kitechen_orders.or_id')
                ->get();

            $allorder = Order::all();
            $stock = StockReport::all();

            return view('admin.k-dashboard',compact('allorder','stock','orderwithpay'));
        }



    }

    public function GetIncome(Request $request){
        $result = Income::where('or_month', $request->input('sdate')) ->where('or_year', $request->input('edate'))->get();
        return $result ;
    }


}
