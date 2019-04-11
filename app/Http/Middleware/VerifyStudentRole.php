<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Constant;

class VerifyStudentRole
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
        if(!Auth::user() || Auth::user()->role !== Constant::ROLE_STUDENT){
            return redirect('/');
        }

        return $next($request);
    }
}
