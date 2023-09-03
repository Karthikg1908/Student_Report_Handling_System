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
        $guards = empty($guards) ? [null] : $guards;

        if (empty($guards))
        {
            foreach ($guards as $guard) {
                if(Auth::user()->userType == 'ADMIN')
                {
                    return $next($request);
                }
                else if(Auth::user()->userType == 'CLASSTEACHER')
                {
                    return $next($request);
                }
                else if(Auth::user()->userType == 'STUDENT')
                {
                    return $next($request);
                }
            }
        }
        else
        {
            return $next($request);
        }
    }
}
