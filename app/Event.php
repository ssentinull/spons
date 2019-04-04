<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function document(){
        return $this->belongsTo('App\Document');
    }

    public function users(){
        return $this->belongsToMany('App\User');
    }
}
