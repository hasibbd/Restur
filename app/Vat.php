<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Vat extends Model
{
   protected $fillable =[
        'vat_name','vat_price','vat_status'
   ];
}
