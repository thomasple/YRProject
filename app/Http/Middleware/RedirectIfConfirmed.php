<?php

namespace App\Http\Middleware;

use Closure;

class RedirectIfConfirmed
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
            return redirect()->guest('/');
        }
        return $next($request);
    }
}
