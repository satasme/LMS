<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaperCategory extends Model
{
    //

    protected $table = 'papercategories';


    protected $fillable = [
        'categoryid','categoryname','description','icon'
    ];
}
