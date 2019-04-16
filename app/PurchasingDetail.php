<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PurchasingDetail extends Model
{
    protected $table = 'purchasing_detail';
    protected $fillable = [
        'purchase_order_no',
        'purchase_order_no_detail',
        'item_barcode',
        'quantity',
        'unit_price',
        'subtotal',
        'tax',
        'company_id',
        'user_id'
    ];
}
