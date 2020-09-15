<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
   protected $fillable =[
        'ex_name','ex_by','ex_amount','ex_month','ex_year','ex_type','ex_id',
   ];
}
