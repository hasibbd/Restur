<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable =[
        'order_id','price','vat','discount','grand_price','pay_status','pay_price',
    ];
}
