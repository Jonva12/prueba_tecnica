<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Foundation\Auth;

class CheckRol
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $rol)
    {
        if(auth()->user()->rol->nombre != $rol){
            return redirect('/home');
        }else{
            return $next($request);
        }
    }
}
