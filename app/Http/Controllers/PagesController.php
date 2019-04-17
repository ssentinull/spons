<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\EventType;

class PagesController extends Controller
{
    public function landingPage(){
        return view('pages.landing');
    }

    public function signInPage(){
        return view('pages.signIn');
    }

    public function studentRegisterPage(){
        return view('pages.studentRegister');
    }

    public function companyRegisterPage(){
        return view('pages.companyRegister');
    }

    public function createEventPage(){
        $eventTypes = EventType::all();

        return view('pages.createEvent')->with('eventTypes', $eventTypes);
    }

    public function eventsPage(){
        $events = Event::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.events')->with('events', $events);
    }
}
