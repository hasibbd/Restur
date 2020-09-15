<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemStock extends Model
{
    protected $fillable =[
        'item_name','item_sup','item_q','item_p','item_d','item_s','item_id',
    ];
}
