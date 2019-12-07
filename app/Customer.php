<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'customer_name',
        'customer_email',
        'password',
        'phone_number',
    ];
}
