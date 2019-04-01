<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company_Event extends Model
{
    public function document(){
        return $this->belongsTo('App\Document');
    }
}
