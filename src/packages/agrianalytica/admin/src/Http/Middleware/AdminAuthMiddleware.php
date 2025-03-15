<?php

namespace Agrianalytica\Admin\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAuthMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = Auth::guard('employee')->user();

        if (!$user) {
            return redirect()->route('admin.login')->withErrors('Войдите в систему.');
        }

        return $next($request);
    }
}
