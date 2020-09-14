<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class checkloginuser
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
        if(Auth::check() && Auth::user()->role_id == 2 && Auth::user()->status_id == 1){
            return $next($request);
        }else{
            return response()->json([
                'Error' => 'notlogin'
            ]);
        }
    }
}
