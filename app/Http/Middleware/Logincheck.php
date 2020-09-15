<?php

namespace App\Http\Middleware;

use Closure;

class Logincheck
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
        if (!$request->session()->exists('emp_name')) {
            return redirect()->route('login');
        }
        return $next($request);
    }
}
