<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    protected $fillable =[
     'emp_id','emp_image','emp_name','emp_phone','emp_email','emp_password','emp_type','emp_address'
    ];
}
