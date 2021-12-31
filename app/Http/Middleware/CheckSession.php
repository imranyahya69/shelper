<?php

namespace App\Http\Middleware;

use Session;
use Closure;
use Illuminate\Contracts\Session\Session as SessionSession;

class CheckSession
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
        if(!Session::get('token')){
            return redirect('/home');
        }
        return $next($request);
    }
}
