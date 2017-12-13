<?php

namespace App\Http\Middleware;

use Closure;

class EmailMiddleware
{
    public function handle($request, Closure $next)
    {
        echo 'is email middleware';
        return $next($request);
    }
}
