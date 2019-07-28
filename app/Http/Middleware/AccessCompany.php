<?php

namespace App\Http\Middleware;

use Closure;

class AccessCompany
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
        if(Auth::user()->hasAnyRoles(['company'])){
            return $next($request);
        }
        else{
            return redirect('home');
            //abort(403, 'Unauthorized action.');
        }
    }
}
