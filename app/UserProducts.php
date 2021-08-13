<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserProducts extends Model
{
    protected $fillable = [
        'user_id', 'product_name', 'product_id',
    ];
}
