<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Purchasing extends Model
{
    protected $table = 'purchasing';
    protected $fillable = [
        'purchase_order_no',
        'supplier_id',
        'total',
        'shipping_type',
        'shipping_charge',
        'company_id',
        'user_id'
    ];
}
