<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class Manager
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

        // if (Auth::user()->is_manager !== 1 || Auth::user()->is_admin !== 1) {
        //     return redirect()->route('public.index');
        // }

        // return $next($request);

        if (Auth::user()->is_manager == 1) {
            return $next($request);
        }

        return redirect()->route('public.index');
    }
}
