<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function grants(){
        return $this->hasMany('App\Grant');
    }
}
