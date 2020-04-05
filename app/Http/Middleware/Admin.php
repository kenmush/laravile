<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Admin
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

            return redirect()->route('admin.login');
            
        }
        if(Auth::user()->role_id == 1) {

            return $next($request);
            
        }

        return redirect(route('admin.dashboard'));
    }
}
