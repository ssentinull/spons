<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    public function event(){
        return $this->hasOne('App\Event');
    }

    public function company_events(){
        return $this->hasOne('App\Company_Event');
    }
}
