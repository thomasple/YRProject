<?php

namespace App\Http\Middleware;

use Closure;

class MainAdmin
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
        if (session()->has('main_admin')) {
            return $next($request);
        }
        return redirect()->guest('/main_admin');
    }
}
