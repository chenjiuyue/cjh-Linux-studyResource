<?php
namespace App\Http\Middleware;
use Closure;

class MyMiddleware
{

    public function handle($request, Closure $next)
    {
        echo 'MyMiddleware is runnings!';
        return $next($request);
    }
}