<?php

namespace App\Http\Middleware;

use Closure;

class LoginMiddleware
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
        if(session('uname') || session('auth') || session('img')){
            if(!session('auth')<2){
                return redirect('/admin/login');
            }
            return $next($request);
        }else{
            return redirect('/admin/login');  
        }
    }
}
