<?php

namespace App\Http\Middleware;

use Closure;

class LoginsMiddleware
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
        if(session('auth') == 0){
            return $next($request);
        }else{
            return back();
        }
    }
}
