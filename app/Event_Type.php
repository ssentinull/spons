<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event_Type extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function events(){
        return $this->hasMany('App\Event');
    }
}
