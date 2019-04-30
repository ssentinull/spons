<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GrantType extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description',
    ];

    public function grants(){
        return $this->hasMany('App\Grant');
    }
}
