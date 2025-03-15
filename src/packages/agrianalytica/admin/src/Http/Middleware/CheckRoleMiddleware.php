<?php

namespace Agrianalytica\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckRoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        $user = Auth::guard('employee')->user();

        if (!$user || $user->role->name !== $role) {
            return abort(403, 'У вас нет доступа.');
        }

        return $next($request);
    }
}
