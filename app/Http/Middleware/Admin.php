<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Admin
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
        // if (!Auth::check()) {
        //     return redirect()->route('login');
        // }

        // if (Auth::user()->is_admin !== 1) {
        //     return redirect()->route('public.index');
        // }
        if (Auth::user()->is_admin == 1) {
            return $next($request);
        }
        // return $next($request);
        return redirect()->route('public.index');
    }
}
