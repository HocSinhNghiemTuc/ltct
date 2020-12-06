<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    public function images() {
    	return $this->hasMany(ProductImage::class, 'product_id');
    }
}
