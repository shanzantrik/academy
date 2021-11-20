<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Admin
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
        if(Auth::check()){
            if(Auth::user()->status && Auth::user()->role=="admin"){
               return $next($request);
            }
            else{
             return redirect('/admin/login')->with('error','Please Login and try again');
           }
       }
       else{
             return redirect('/admin/login')->with('error','Please Login and try again');
        }
    }
}
