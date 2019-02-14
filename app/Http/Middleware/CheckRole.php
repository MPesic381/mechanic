<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
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
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            abort(401, 'You are not authorized to see that');
        }

        return $next($request);
    }
}
