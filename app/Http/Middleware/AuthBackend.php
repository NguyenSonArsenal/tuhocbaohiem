<?php

namespace App\Http\Middleware;

use Closure;

class AuthBackend
{
    public function handle($request, Closure $next)
    {
        if (!isBeLogin()) {
            return redirect()->route('be.login');
        }
        return $next($request);
    }
}