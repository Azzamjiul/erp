<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable= [
        'supplier_name',
        'supplier_email',
        'supplier_phone',
        'supplier_address',
        'supplier_description',
        'company_id',
        'user_id'
    ];
}
