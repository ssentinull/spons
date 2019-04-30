<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Grant extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nominal_amount', 'descriptive_amount', 'grant_types_id', 'user_id'
    ];

    public function company(){
        return $this->belongsTo('App\User');
    }

    public function grantType(){
        return $this->belongsTo('App\GrantType');
    }
}
