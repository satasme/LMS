<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diagram extends Model
{
    //

    protected $table = 'diagram';


    protected $fillable = [
        'diagram','nooflables','noofquestions','marks','quizid'
    ]; 

}
