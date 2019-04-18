<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Selling extends Model
{
    protected $table = 'selling';

    protected $fillable = [
        'sales_order_no',
        'customer_id',
        'total',
        'courier',
        'delivery_date',
        'shipping_type',
        'shipping_charge',
        'company_id',
        'user_id'
    ];
}
