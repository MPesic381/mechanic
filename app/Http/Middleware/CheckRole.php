<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Checks if user is authenticated and has appropriate role
     * and then handles the request
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param string $role
     * @return mixed
     */
    public function handle($request, Closure $next, string $role)
    {
        if (!auth()->user() || !auth()->user()->hasRole($role)) {
            abort(401, 'You are not authorized to see that');
        }

        return $next($request);
    }
}
