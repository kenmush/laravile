<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Client
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
        if(!Auth::Check()){

            return redirect()->route('login');

        }
        if(Auth::user()->role_id == 2) {

            return $next($request);

        }else{
            abort(404);
        }
    }
}
