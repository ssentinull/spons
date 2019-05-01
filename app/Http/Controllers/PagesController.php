<?php

namespace App\Http\Controllers;

use Auth;

use App\Company;
use App\Constant;
use App\Event;
use App\EventCategory;
use App\EventType;
use App\GrantType;
use App\StudentIndividual;
use App\StudentOrganization;
use App\User;
use Illuminate\Http\Request;

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

    public function eventsPage(){
        $events = Event::orderBy('created_at', 'desc')->paginate(6);
        $firstEventIndex = $events->firstItem();

        return view('pages.events')->with(compact('events', 'firstEventIndex'));
    }

    public function eventDetailPage(){
        return view('pages.detail');
    }

    public function companiesPage(){
        $companies = User::where('role', Constant::ROLE_COMPANY)->with(['company'])->paginate(6);
        $firstCompanyIndex = $companies->firstItem();

        return view('pages.companies')->with(compact('companies', 'firstCompanyIndex'));
    }

    public function companyDetailPage(){
        return view('pages.detailCompany');
    }

    public function profilePage(){
        $user = Auth::user();

        if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){

            if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL){
                $userData = StudentIndividual::find($user->email);
            } else if($user->role == Constant::ROLE_STUDENT_ORGANIZATION){
                $userData = StudentOrganization::find($user->email);
            }

            $events = Event::where('user_id', $user->id)->paginate(6);
            dd($user->email);
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
        }

        return view('pages.createEvent')->with(compact('userData', 'eventTypes', 'eventCategories'));
    }

    public function createGrantPage(){
        $grantTypes = GrantType::all();
        $userId = Auth::user()->id;
        $userData = Company::find($userId);

        return view('pages.createGrant')->with(compact('userData', 'grantTypes'));
    }
}
