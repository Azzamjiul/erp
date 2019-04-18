<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SellingDetail extends Model
{
    protected $table = 'selling_detail';

    protected $fillable = [
        'sales_order_no',
        'sales_order_no_detail',
        'product_code',
        'quantity',
        'unit_price',
        'subtotal',
        'tax',
        'total',
        'company_id',
        'user_id'
    ];
}
