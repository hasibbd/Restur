<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable =[
        'menu_name','menu_icon1','menu_id','menu_type','menu_role','menu_link','menu_id_val'
    ];
}
