<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McqResultsAnsers extends Model
{
    protected $table = 'mcqresultsansers';


    protected $fillable = [
        'quizresultid','quizid','optionid','correct'
    ];
}
