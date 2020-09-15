<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable =[
         'd_name','d_type','i_name','i_q',
    ];
}
