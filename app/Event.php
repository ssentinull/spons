<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    public function student(){
        return $this->belongsTo('App\Student');
    }

    public function document(){
        return $this->belongsTo('App\Document');
    }

    public function companies(){
        return $this->belongsToMany('App\Company');
    }
}
