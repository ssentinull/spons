<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='companies';
    protected $fillable = [
        'established_in', 'address', 'description', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
