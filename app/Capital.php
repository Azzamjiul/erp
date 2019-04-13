<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Capital extends Model
{
    protected $fillable = [
        'capital_name',
        'capital_amount',
        'explanation',
        'company_id',
        'user_id'
    ];
}
