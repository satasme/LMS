<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class blankoptions extends Model
{
    //
    protected $table = 'blankoptions';


    protected $fillable = [
        'answer','question_id'
    ];
}
