<?php

namespace App\Http\Middleware;

use Closure;

class DetectMiddleware
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
        $response = $next($request);

        if($request->query('ref')) {
            $response->withCookie(cookie()->forever('affiliate',$request->query('ref')));
        }

        return $response;
    }
}
