<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if(Auth::id() != null && Auth::user()->role_id == 1)
        {
            return redirect('/');
        }  
        elseif(Auth::id() != null && Auth::user()->role_id == 2) 
        { 
            return redirect('/owner');
        }
        elseif(Auth::id() != null && Auth::user()->role_id == 3)
        {

            return redirect('/administrator');
        }
        else
        {
            $guards = empty($guards) ? [null] : $guards;
        
            foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {

                return redirect('/');
                }
            }

        }
        
        return $next($request);
        
    }
}