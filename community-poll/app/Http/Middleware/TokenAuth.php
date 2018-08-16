<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class TokenAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $token = $request->header ('x-api-token');
        if ('test-api' != $token) {
            $status = Response::HTTP_UNAUTHORIZED;
            abort ($status, Response::$statusTexts[$status]);
        }

        return $next($request);
    }
}
