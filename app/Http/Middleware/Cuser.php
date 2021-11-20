<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Cuser
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
            if(Auth::user()->status && Auth::user()->role=="user"){
               return $next($request);
            }
            else{
            return redirect('/verify')->with('success','Please verify mobile');
               
            }
        }
        else{
            return redirect('/login')->with('error','Please Login and try again');
        }
    }
}
