<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function landingPage(){
        return view('pages.landing');
    }

    public function signInPage(){
        return view('pages.signIn');
    }

    public function loginPage(){
        return view('pages.login');
    }
    
    public function companyRegisterPage(){
        return view('pages.companyRegister');
    }
}
