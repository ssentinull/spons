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

    public function profilePage(){
        $user = Auth::user();

        if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){

            if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL){
                $userData = StudentIndividual::find($user->id);
            } else if($user->role == Constant::ROLE_STUDENT_ORGANIZATION){
                $userData = StudentOrganization::find($user->id);
            }

            $events = Event::where('user_id', $user->id)->paginate(6);

            return view('pages.profile')->with(compact('userData','events'));
        } else if($user->role == Constant::ROLE_COMPANY){
            $userData = Company::find($user->id);
            return view('pages.profile')->with('userData', $userData);
        }
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
        $firstEventIndex = $events->firstItem();

        return view('pages.events')->with(compact('events', 'firstEventIndex'));
    }
}
