<?php

namespace App\Http\Middleware;

use Closure;


class CheckStatus
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
        if (auth()->user()->status_id !== 1) {
            // auth()->logout();
            // abort(403, 'Please contact admin');
            return redirect()->route('users.status.approval');
        }
        return $next($request);
    }
}
