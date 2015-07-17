<?php

namespace App\Http\Middleware;

use Closure;

class Confirmed
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
        if(session()->has('confirmed') AND session('confirmed')) {
            return $next($request);
        }
        return redirect()->guest('/confirm');
    }
}
