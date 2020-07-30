<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class headingmatch extends Model
{
    //

    protected $table = 'headingmatch';


    protected $fillable = [
        'paragraphname','content','quizid','headingid'
    ];

}
