<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class fillingblank extends Model
{
    //
    protected $table = 'fillingblanks';


    protected $fillable = [
        'Question','questiontype','marks','blankoptions','quizid'
    ];
}
