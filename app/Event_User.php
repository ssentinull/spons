<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_User extends Model
{
    public function document(){
        return $this->belongsTo('App\Document');
    }
}
