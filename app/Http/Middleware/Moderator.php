<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Auth;

class Moderator
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
            if(Auth::user()->status && Auth::user()->role=="moderator"){
               return $next($request);
            }
            else{
             return redirect('/moderator/login')->with('error','Please Login and try again');
           }
       }
       else{
             return redirect('/moderator/login')->with('error','Please Login and try again');
        }
    }
}
