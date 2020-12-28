<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
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
    public static function getImagebyId($id){
        $sqlQuery = "SELECT feature_image_path FROM products where id = $id and deleted_at is null";
        $result = DB::select(DB::raw($sqlQuery));
        foreach ($result as $tmp){
            return $tmp->feature_image_path;
        }
        return null;
    }
    public static function getProductName($id){
        $sqlQuery = "SELECT name FROM products where id = $id and deleted_at is null";
        $result = DB::select(DB::raw($sqlQuery));
        foreach ($result as $tmp){
            return $tmp->name;
        }
        return "Product deleted";
    }
}
