<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    protected $fillable = [
        'asset_id',
        'asset_name',
        'asset_cost',
        'asset_duration',
        'asset_duration_type',
        'asset_quantity',
        'asset_quantity_type',
        'asset_salvation_value',
        'asset_type',
        'company_id',
        'user_id'
    ];
}
