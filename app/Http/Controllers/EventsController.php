<?php

namespace App\Http\Controllers;

use Auth;
use App\Event;
use Illuminate\Http\Request;

class EventsController extends Controller
{
    protected $table='events';
    protected function create(Request $request)
    {
        //  dd($data);

        if(!Auth::user()){
            return redirect('/');
        }

        $request['user_id'] = Auth::user()->id;

        return Event::create([
            'name' => $request->name,
            'date' => $request->date,
            'location' => $request->location,
            // 'description' => $data['desc'],
            // 'role' => $data['role'],
             'description' => $request->description,
             'type' => 1,
             'category' => 1,
             'file' => $request->file,
             'document_id' =>1,
             'user_id' => $request->user_id,
            // 'address' => $data['address']
        ]);
    }
}
