<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';
    // protected $redirectTo = if (User[$data] == company[$data]){
   //     return view ('company_home');
   // } else{
   //     return view ('students_home');
   // };

   public function showLoginForm()
   {
       return view ('pages.signIn');
   }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
