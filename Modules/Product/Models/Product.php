<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Modules\Category\Models\Category;

class Product extends Model
{
    use SoftDeletes;
    protected $guarded = [];
    protected $table = 'products';
    public function images() {
    	return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function tags() {
    	return $this
    	->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id')
    	->withTimestamps();
    }

    public function category() {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function productImages() {
        return $this->hasMany(ProductImage::class, 'product_id');
    }

    public function getSearchResult($productName) {
        $searchResults = Product::where('name', 'LIKE', "%{$productName}%")->get();
        return $searchResults;
    }
}
