<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coursetest extends Model
{
    //
    protected $table = 'coursetest';


    protected $fillable = [
        'testid','test_title','description','courseid','coursename','icon'
    ]; 
}
