<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class FlashSessionMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        if (session()->has('success')) {
            session()->reflash();
        }

        return $response;
    }
}
