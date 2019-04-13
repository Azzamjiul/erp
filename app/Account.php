<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $table = 'gl_account';

    protected $fillable = [
        'parentId',
        'account_number',
        'account_name',
        'account_description',
        'company_id',
        'user_id'
    ];
}
