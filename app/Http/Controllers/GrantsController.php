<?php

namespace App\Http\Controllers;

use Auth;

use App\Grant;
use Illuminate\Http\Request;

class GrantsController extends Controller
{
    public function create(Request $request){

        if(!Auth::user()){
            return redirect()->route('landingPage');
        }

        $request['user_id'] = Auth::user()->id;

        $grant = Grant::create($request->all());

        if(!$grant){
            return redirect('errorPage');
        }

        return redirect()->route('profilePage');
    }
}
