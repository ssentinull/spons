<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    public function create(Request $request){
        if(!Auth::user()){
            return redirect('/');
        }

        $request['user_id'] = Auth::user()->id;

        $event = Event::create($request->all());

        if(!$event){
            return redirect('errorPage');
        }

        return redirect('/');
    }
}
