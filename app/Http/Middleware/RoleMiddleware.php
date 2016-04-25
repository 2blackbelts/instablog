<?php

namespace instablog\Http\Middleware;

use Closure;
use Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        if(Auth::check())
        {
            if(!$request->user()->hasRole($role))
            {
                return redirect('login');
            }
            return $next($request);
        }
        return redirect('login');
    }
}
