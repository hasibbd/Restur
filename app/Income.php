<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    protected $fillable =[
        'or_id','or_by','or_price','or_vat','or_discount','or_grand_price','or_month','or_year','or_status',
    ];

}
