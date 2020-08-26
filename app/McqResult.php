<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McqResult extends Model
{
    protected $table = 'mcqresults';


    protected $fillable = [
        'quizid','userid','Result'
    ];
}
