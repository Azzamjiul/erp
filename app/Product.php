<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $table = 'product_item';

    // protected $fillable = [
    //     'product_group_number',
    //     'product_item_barcode',
    //     'product_item_name',
    //     'company_id',
    //     'user_id'
    // ];

    protected $table = 'products';

    protected $fillable = [
        'id',
        'parentId',
        'name',
        'price',
        'total'
    ];
}
