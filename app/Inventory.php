<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    protected $table = 'inventories';

    protected $fillable = [
        'parentId',
        'product_item_barcode',
        'product_code',
        'inventory_item_name',
        'inventory_item_stock',
        'inventory_item_description',
        'inventory_item_photo',
        'inventory_item_purchase_price',
        'inventory_item_sale_price',
        'company_id',
        'user_id'
    ];
}
