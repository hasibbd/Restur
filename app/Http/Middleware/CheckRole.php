<?php

namespace App\Http\Middleware;

use App\Employee;
use Closure;
use Illuminate\Support\Facades\DB;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $r = DB::table('employees')->join('employee_statuses', 'employees.emp_id','=','employee_statuses.emp_id')->get();


        if ($r->isNotEmpty()) {
            foreach ($r as $t) {
                if ((($t->emp_id == $request->email) || ($t->emp_email == $request->email)) && $t->emp_password == $request->password && $t->emp_status == 1) {

                    session([
                        'emp_name' => $t->emp_name,
                        'emp_image' => $t->emp_image,
                        'emp_id' => $t->emp_id,
                        'emp_type' => $t->emp_type,
                    ]);
                    return redirect()->route('dash');
                    // return $next($request);
                }
                elseif ((($t->emp_id == $request->email) || ($t->emp_email == $request->email)) && $t->emp_password != $request->password && $t->emp_status == 1){
                    return redirect()->route('login')->with('msg','Mismatch Password');
                }
                elseif ((($t->emp_id == $request->email) || ($t->emp_email == $request->email)) && $t->emp_password == $request->password && $t->emp_status == 0){
                    return redirect()->route('login')->with('msg','Your account is disabled');
                }
            }
            return redirect()->route('login')->with('msg','Your are not an user');
        }
        else{
            return redirect()->route('login')->with('msg','Your are not an user');
        }

    }
}
