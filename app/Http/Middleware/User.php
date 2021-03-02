<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
class User
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
        if (!Auth::check()) {
            return redirect()->route('login');
        };
        //role 1 = user
        if (Auth::user()->role == 'user') {
            return redirect()->route('admin');
           
        }

        //role 2 = company
        if (Auth::user()->role == 'company') {
            return redirect()->route('company');
        }

        //role 3 = admin
        if (Auth::user()->role == 'admin') {
            return $next($request);
        }
    }
}
