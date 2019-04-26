<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

use App\Constant;

class VerifyCompanyRole
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
        $user = Auth::user();

        if(!$user || ($user->role !== Constant::ROLE_COMPANY)){
            return redirect()->route('landingPage');
        }

        return $next($request);
    }
}
