<?php

namespace App\Http\Controllers;

use Auth;

use App\Company;
use App\Constant;
use App\Event;
use App\EventCategory;
use App\EventType;
use App\Event_User;
use App\GrantType;
use App\StudentIndividual;
use App\StudentOrganization;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException;
use GuzzleHttp\Client;

class PagesController extends Controller
{
    public $globalCategories = [
        Constant::EVENT_CATEGORY_TECHNOLOGY,
        Constant::EVENT_CATEGORY_BUSINESS,
        Constant::EVENT_CATEGORY_ART,
        Constant::EVENT_CATEGORY_SCIENCE,
        Constant::EVENT_CATEGORY_SOCIAL,
    ];

    public $globalTypes = [
        Constant::EVENT_TYPE_SEMINAR,
        Constant::EVENT_TYPE_FESTIVAL,
        Constant::EVENT_TYPE_CONFERENCE,
        Constant::EVENT_TYPE_WORKSHOP,
    ];

    public function landingPage(){
        return view('pages.landing');
    }

    public function getEventsApi(){
        try{
            $events = Event::orderBy('created_at', 'desc')->paginate(6);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $events
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    public function eventsPage(){
        $events = Event::orderBy('created_at', 'desc')->paginate(6);
        $types = $this->globalTypes;
        $categories = $this->globalCategories;

        return view('pages.events')->with(compact('events', 'types', 'categories'));
    }

    public function eventsFilteredPage(Request $request){
        $query = Event::whereNotNull('created_at');

        if($request->eventTypeFilter){
            $query->where('type', $request->eventTypeFilter);
        }

        if($request->eventCategoryFilter){
            $query->where('category', $request->eventCategoryFilter);
        }

        if($request->orderByFilter){
            if($request->orderByFilter == 'asc'){
                $query->orderBy('created_at', 'asc');
            } else {
                $query->orderBy('created_at', 'desc');
            }
        }

        $events = $query->paginate(6);
        $types = $this->globalTypes;
        $categories = $this->globalCategories;

        return view('pages.events')->with(compact('events', 'categories', 'types'));
    }

    public function getEventApi($eventId){
        try{
            $event = Event::find($eventId);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $event
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    public function eventDetailPage($eventId){
        $event = Event::find($eventId);
        $organizer = $event->user;

        return view('pages.eventDetail')->with(compact('event', 'organizer'));
    }

    public function getCompaniesApi(){
        try{
            $companies = User::where('role', Constant::ROLE_COMPANY)
                ->orderBy('name', 'ASC')
                ->with(['company'])
                ->paginate(6);

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $companies
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    public function companiesPage(){
        $companies = User::where('role', Constant::ROLE_COMPANY)
            ->orderBy('name', 'ASC')
            ->with(['company'])
            ->paginate(6);

        $firstCompanyIndex = $companies->firstItem();

        return view('pages.companies')->with(compact('companies', 'firstCompanyIndex'));
    }

    public function getCompanyApi($companyId){
        try{
            $companyUser = User::find($companyId);
            $companyData = $companyUser->company;

            $returnObj = (object) [
                'code' => 200,
                'message' => 'success',
                'payload' => $companyUser
            ];

            return json_encode($returnObj);
        }catch(QueryException $e){
            $returnObj = (object) [
                'code' => 400,
                'message' => $e->getMessage(),
                'payload' => []
            ];

            return json_encode($returnObj);
        }
    }

    public function companyDetailPage($companyId){
        $companyUser = User::find($companyId);
        $companyData = $companyUser->company;
        $user = Auth::user();

        if($user !== null && ($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION)){
            $events = $user->studentEvents;
            $submittedEvents = Event_User::where([
                ['student_id', '=', $user->id],
                ['user_id', '=', $companyId],
            ])->get();

            foreach($events as $i => $event){
                foreach($submittedEvents as $submittedEvent){
                    if($event->id == $submittedEvent->event_id){
                        unset($events[$i]);
                    }
                }
            }

            return view('pages.companyDetail')->with(compact('companyUser', 'companyData', 'events'));
        }

        return view('pages.companyDetail')->with(compact('companyUser', 'companyData'));
    }

    public function profilePage(){
        $user = Auth::user();

        if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){

            if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL){
                $userData = $user->studentIndividual;
            } else if($user->role == Constant::ROLE_STUDENT_ORGANIZATION){
                $userData = $user->studentOrganization;
            }

            $events = $user->studentEvents()->orderBy('created_at', 'DESC')->paginate(6);
            return view('pages.profile')->with(compact('userData','events'));
        }

        if($user->role == Constant::ROLE_COMPANY){
            $userData = $user->company;
            $grants = $user->grants()->paginate(6);

            return view('pages.profile')->with(compact('userData', 'grants'));
        }

        return redirect('errorPage');
    }

    public function createEventPage(){
        $eventCategories = EventCategory::all();
        $eventTypes = EventType::all();
        $user = Auth::user();

        if(Auth::user()->role == Constant::ROLE_STUDENT_INDIVIDUAL){
            $userData = $user->studentIndividual;
        } else if(Auth::user()->role == Constant::ROLE_STUDENT_ORGANIZATION){
            $userData = $user->studentOrganization;
        }

        return view('pages.createEvent')->with(compact('userData', 'eventTypes', 'eventCategories'));
    }

    public function createGrantPage(){
        $grantTypes = GrantType::all();
        $userData = Auth::user()->company;

        return view('pages.createGrant')->with(compact('userData', 'grantTypes'));
    }

    public function transactionsPage(){
        $user = Auth::user();

        if($user){
            if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){

                if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL){
                    $userData = $user->studentIndividual;
                } else if($user->role == Constant::ROLE_STUDENT_ORGANIZATION){
                    $userData = $user->studentOrganization;
                }

                $transactions = Event_User::whereIn('student_confirmation_status',
                    [Constant::SPONSORSHIP_REQUEST_ACCEPTED, Constant::SPONSORSHIP_REQUEST_REJECTED])
                    ->where('student_id', $user->id)
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(6);
            }

            if($user->role == Constant::ROLE_COMPANY){

                $userData = $user->company;

                $transactions = Event_User::whereIn('company_confirmation_status',
                    [Constant::SPONSORSHIP_REQUEST_ACCEPTED, Constant::SPONSORSHIP_REQUEST_REJECTED])
                    ->where('user_id', $user->id)
                    ->orderBy('updated_at', 'DESC')
                    ->paginate(6);
            }

            $events = [];

            foreach($transactions as $i => $transaction){
                $events[$i] = Event::find($transaction->event_id);
            }

            return view('pages.transactions')->with(compact('userData', 'transactions', 'events'));
        }

        return redirect('errorPage');
    }

    public function sponsorshipRequestsPage(){
        $user = Auth::user();

        if($user){
            if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){

                if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL){
                    $userData = $user->studentIndividual;
                } else if($user->role == Constant::ROLE_STUDENT_ORGANIZATION){
                    $userData = $user->studentOrganization;
                }

                $sponsorshipRequests = Event_User::where([
                    ['student_confirmation_status', '=', Constant::SPONSORSHIP_REQUEST_PENDING],
                    ['student_id', '=', $user->id],
                ])
                ->orderBy('created_at', 'DESC')
                ->paginate(6);
            }

            if($user->role == Constant::ROLE_COMPANY){
                $userData = $user->company;

                $sponsorshipRequests = Event_User::where([
                    ['company_confirmation_status', '=', Constant::SPONSORSHIP_REQUEST_PENDING],
                    ['user_id', '=', $user->id],
                ])
                ->orderBy('created_at', 'DESC')
                ->paginate(6);
            }

            $events = [];

            foreach($sponsorshipRequests as $i => $sponsorshipRequest){
                $events[$i] = Event::find($sponsorshipRequest->event_id);
            }

            return view('pages.sponsorshipRequests')->with(compact('userData', 'sponsorshipRequests', 'events'));
        }

        return redirect('errorPage');
    }
}
