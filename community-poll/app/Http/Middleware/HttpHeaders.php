<?php

namespace App\Http\Middleware;

use Closure;

class HttpHeaders
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $text = null)
    {
        $response = $next($request);
        $response->header('x-laravel-api', $text);
        return $response;
    }
}
