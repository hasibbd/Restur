<?php

namespace App\Http\Middleware;

use Closure;

class Kitchencheck
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
        if (session('emp_type') == '3' or session('emp_type') == '1'){
            return $next($request);
        }
        return redirect()->route('logout')->with('msg', 'Unauthorized Action Performed');
    }
}
