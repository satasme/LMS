<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortAnsOption extends Model
{
    public $table = "short_answer_options";
    protected $fillable=[
        'shortanswer_value','shortquiz_id'
    ];
   
}
