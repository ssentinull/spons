<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Constant;
use App\Event;
use App\EventType;
use App\EventCategory;
use App\StudentIndividual;
use App\StudentOrganization;
use App\Company;

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
        $eventCategories = EventCategory::all();
        $userId = Auth::user()->id;

        if(Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL){
            $userData = StudentIndividual::find($userId);
        } else if(Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION){
            $userData = StudentOrganization::find($userId);
        } else if(Auth::user()->role == Constant::ROLE_COMPANY){
            $userData = Company::find($userId);
        }

        return view('pages.createEvent')->with(compact('userData', 'eventTypes', 'eventCategories'));
    }

    public function eventsPage(){
        $events = Event::orderBy('created_at', 'desc')->paginate(6);

        return view('pages.events')->with('events', $events);
    }
}
