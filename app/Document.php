<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function event(){
        return $this->hasOne('App\Event');
    }

    public function event_user(){
        return $this->hasOne('App\Event_User');
    }
}
