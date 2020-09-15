<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Table extends Model
{
    protected $fillable =[
        'tbl_name','tbl_capacity','tbl_status'
    ];
}
