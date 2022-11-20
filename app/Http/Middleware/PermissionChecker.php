<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;

class PermissionChecker
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, $param)
    {
        $perms = Role::find(auth()->user()->role_id)->permissions();
        $perms->mergeRecursive(User::find(auth()->id())->permissions());

        if ($perms->has($param)) {
            return $next($request);
        }

        return abort(401);
    }
}
