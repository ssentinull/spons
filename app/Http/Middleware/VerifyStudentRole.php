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
        $user = Auth::user();

        if(!$user || ($user->role !== Constant::ROLE_STUDENT_INDIVIDUAL && $user->role !== Constant::ROLE_STUDENT_ORGANIZATION)){
            return redirect('/');
        }

        return $next($request);
    }
}
