<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    protected $fillable =[
        'dish_image','dish_name','dish_type','dish_id','dish_vat','dish_price','dish_discount','dish_unit','dish_status',
    ];
}
