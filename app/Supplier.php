<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable=[
        'splr_name','splr_email','splr_phone','splr_address','splr_status'
    ];
}
