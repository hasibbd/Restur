<?php

namespace App\Http\Controllers;

use App\Employee;
use App\EmployeeStatus;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class EmployeeController extends Controller
{
    public function EmployeeGet($id){
        $emp = Employee::find($id);
        return Response()->json([
            "m" => "employee",
            "ms" => $emp,
        ]);

    }
    public function EmployeeDelete($id){
        $emp = Employee::find($id);
        $image_path = "image/employee/$emp->emp_image";
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        Employee::destroy($id);
        EmployeeStatus::destroy($id);
        return "success";

    }
    public function EmployeeStatus($id){
        $emp = EmployeeStatus::find($id);
        if ($emp->emp_status == 1){
            $emp->emp_status = 0;
            $st = 0;
        }
        else{
            $emp->emp_status = 1;
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
    public function AllEmployee(){
        $emp  = DB::table('employees')->join('employee_statuses', 'employees.emp_id','=','employee_statuses.emp_id')->get();
        return view('employee.all-employee',compact('emp'));
    }
    public function AddEmployee(Request $request){
       $emp = new Employee();
       $emp_s = new EmployeeStatus();
       $emp_s->emp_status = 0;
       $emp->emp_name = $request->input('emp_name');
       $emp->emp_email = $request->input('emp_email');
       $emp->emp_phone = $request->input('emp_phone');
       $emp->emp_type = $request->input('emp_type');
       $emp->emp_password = $request->input('emp_password');
       $emp->emp_address = $request->input('emp_address');
       $emp->emp_name = $request->input('emp_name');

       switch ($request->input('emp_type')){
           case '1': $type = "01";break;
           case '2': $type = "02";break;
           case '3': $type = "03";break;
           default: break;
       }
       $val = Carbon::now()->format("Y").$type.rand(10,99);
       $emp->emp_id = $val;
       if ($image = $request->file('emp_image')){
           $name = $val;
           $extension = $image->getClientOriginalExtension();
           $imageName = $name.'.'.$extension;
           $path = public_path('image/employee');
           $image->move($path, $imageName);
           $emp->emp_image = $imageName;
       }
       $emp_s->emp_id = $val;
       $emp->save();
       $emp_s->save();
       return Response()->json([
           "success" => true,
           "title" => "Success!!!",
           "status" => "success",
           "ms" => $emp,
       ]);
   }
    public function UpadteEmployee(Request $request){
        $emp = Employee::find($request->input('id4update'));

        Employee::where('id',$request->input('id4update'))->update([
            'emp_name'=>$request->input('emp_name'),
            'emp_email'=>$request->input('emp_email'),
            'emp_phone'=>$request->input('emp_phone'),
            'emp_type'=> $request->input('emp_type'),
            'emp_address'=>$request->input('emp_address'),
            'emp_password'=>$request->input('emp_password'),

        ]);


        if ($image = $request->file('emp_image')){
            $image_path = "image/employee/$emp->emp_image";
            if(File::exists($image_path)) {
                File::delete($image_path);
            }
            $name = $emp->emp_image;
            $path = public_path('image/employee');
            $image->move($path, $name);
        }
        return Response()->json([
            "success" => true,
            "title" => "Success!!!",
            "status" => "success",
            "ms" => $emp,
        ]);
    }
}
