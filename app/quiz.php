<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class quiz extends Model
{
    //
    protected $table = 'quizes';


    protected $fillable = [
        'quizid','quizname','questionmode','coursename','coursetest','exam','time','papercat','courseid','coursetestid','examid','papercatid'
    ]; 

    

    
}
