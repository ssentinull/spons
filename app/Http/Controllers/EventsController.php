<?php

namespace App\Http\Controllers;

use Auth;

use App\Constant;
use App\Event;
use App\Event_User;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $table='events';

    protected function create(Request $request){

        if(!Auth::user()){
            return redirect('/');
        }

        $hash = substr(sha1(time()), 0, 8);

        $fileExtension = $request->file('uploaded-proposal')->getClientOriginalExtension();
        $fileName = $hash.'.'.$fileExtension;

        $request->file('uploaded-proposal')->storeAs('public/proposals', $fileName);

        $request['proposal'] = $fileName;
        $request['user_id'] = Auth::user()->id;

        $event = Event::create($request->all());

        if(!$event){
            return redirect()->route('errorPage');
        }

        return redirect()->route('profilePage');
    }

    public function studentRequestsSponsorship(Request $request){

        foreach($request->events_picked_ids as $events_picked_id){
            Event_User::create([
                'student_confirmation_status' => Constant::SPONSORSHIP_REQUEST_ACCEPTED,
                'company_confirmation_status' => Constant::SPONSORSHIP_REQUEST_PENDING,
                'student_id' => $request->student_id,
                'user_id' => $request->company_id,
                'event_id' => $events_picked_id
            ]);
        }

        return redirect()->route('transactionsPage');
    }

    public function companyRequestsSponsorship($eventId){
        $company = Auth::user();
        $event = Event::find($eventId);
        $student = $event->user;

        Event_User::create([
            'student_confirmation_status' => Constant::SPONSORSHIP_REQUEST_PENDING,
            'company_confirmation_status' => Constant::SPONSORSHIP_REQUEST_ACCEPTED,
            'student_id' => $student->id,
            'user_id' => $company->id,
            'event_id' => $eventId
        ]);

        return redirect()->route('transactionsPage');
    }

    public function acceptSponsorshipRequest($event_userId){
        $user = Auth::user();
        $eventUser = Event_User::find($event_userId);
        $event = Event::find($eventUser->event_id);

        if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){
            if($user->id !== $eventUser->student_id){
                return redirect('errorPage');
            }

            $eventUser->student_confirmation_status = Constant::SPONSORSHIP_REQUEST_ACCEPTED;
            $eventUser->save();

            return redirect()->route('sponsorshipRequestsPage');
        }

        if($user->role == Constant::ROLE_COMPANY){
            if($user->id !== $eventUser->user_id){
                return redirect('errorPage');
            }

            $eventUser->company_confirmation_status = Constant::SPONSORSHIP_REQUEST_ACCEPTED;
            $eventUser->save();

            return redirect()->route('sponsorshipRequestsPage');
        }

        return redirect('errorPage');
    }

    public function rejectSponsorshipRequest($event_userId){
        $user = Auth::user();
        $eventUser = Event_User::find($event_userId);
        $event = Event::find($eventUser->event_id);

        if($user->role == Constant::ROLE_STUDENT_INDIVIDUAL || $user->role == Constant::ROLE_STUDENT_ORGANIZATION){
            if($user->id !== $eventUser->student_id){
                return redirect('errorPage');
            }

            $eventUser->student_confirmation_status = Constant::SPONSORSHIP_REQUEST_REJECTED;
            $eventUser->save();

            return redirect()->route('sponsorshipRequestsPage');
        }

        if($user->role == Constant::ROLE_COMPANY){
            if($user->id !== $eventUser->user_id){
                return redirect('errorPage');
            }

            $eventUser->company_confirmation_status = Constant::SPONSORSHIP_REQUEST_REJECTED;
            $eventUser->save();

            return redirect()->route('sponsorshipRequestsPage');
        }

        return redirect('errorPage');
    }
}
