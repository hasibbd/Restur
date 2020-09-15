<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
protected $fillable =[
     'order_id','order_by','dish_name','dish_type','dish_status','dish_q','order_tbl',
];
}
