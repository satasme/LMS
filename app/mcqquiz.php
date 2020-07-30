<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class mcqquiz extends Model
{
    //
    protected $table = 'mcqquizes';


    protected $fillable = [
        'Question','marks','options','quizid','correctoptionid'
    ];
}
