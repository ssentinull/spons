<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOrganization extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'established_in', 'address', 'major', 'university', 'description', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
