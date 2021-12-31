<?php

namespace App\Http\Middleware;

use Closure;
use Session;


class CheckRole
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
        if(!Session::get('role') == 'expert'){
            return redirect('/home');
        }
        return $next($request);
    }
}
