<?php

namespace App\Http\Middleware;

use Closure;

class Role
{
    /**
     * Checks if user is authenticated and has appropriate role
     * and handles the right request
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param array $roles
     * @return mixed
     */
    public function handle($request, Closure $next, ...$roles)
    {
        if (!auth()->user()) {
            return redirect('/login');
        }

        $user = auth()->user();

        foreach ($roles as $role) {
            if($user->hasRole($role)) {
                return $next($request);
            }
        }

        return abort(401);
    }
}
