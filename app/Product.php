<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'product_id';

    protected $fillable = [
        'product_title',
        'product_subtitle',
        'product_category_id',
        'product_brand_id',
        'long_description',
        'short_description',
        'product_quantity',
        'price',
        'product_status',
        'product_image',
    ];

}
