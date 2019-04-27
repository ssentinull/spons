<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    public function company(){
        return $this->belongsTo('App\User');
    }

    public function grantType(){
        return $this->belongsTo('App\GrantType');
    }
}
