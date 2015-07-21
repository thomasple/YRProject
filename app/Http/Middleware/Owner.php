<?php

namespace App\Http\Middleware;

use Auth;
use Closure;


class Owner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user() AND Auth::user()->salon_owner) {
            return $next($request);
        }
        return redirect('/');

    }
}
