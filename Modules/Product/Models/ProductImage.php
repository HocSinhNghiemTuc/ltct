<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\SoftDeletes;


class ProductImage extends Model
{
    // use SoftDeletes;
    protected $guarded = [];
    protected $table = 'product_images';

}
