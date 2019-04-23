<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentIndividual extends Model
{

    /**
     * 
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table='student_individuals';
    protected $fillable = [
        'dob', 'city', 'major', 'faculty', 'university', 'user_id'
    ];

    public function user(){
        return $this->belongsTo('App\User');
    }
}
