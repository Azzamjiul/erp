<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Journal extends Model
{
    protected $table = 'journal';

    protected $fillable = [
        'date',
        'line_debit_name',
        'line_credit_name',
        'account_number',
        'line_debit',
        'line_credit'
    ];
}
