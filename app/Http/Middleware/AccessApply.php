<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class AccessApply
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
        if(Auth::user()->filename){
            
            return $next($request);
        }
        return redirect('/user_panel');
    }
}
