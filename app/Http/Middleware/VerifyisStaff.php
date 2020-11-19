<?php

namespace App\Http\Middleware;

use Closure;

class VerifyisStaff
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
        if(!auth()->user()->isStaff()){
            return redirect(route('home'));
        }
        return $next($request);
    }
}
