<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DayBook extends Model
{
    //
     protected $table = 'daybooks';
     protected $fillable = ['date','particular','voucher_type','voucher_number','debit_amount','create_amount'];
}
