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

    public function getProductSearch($request)
    {
        $products = new Product();
        if (!empty($request->product_id)) {
            $products = $products->where('products.id', $request->product_id);
        }
        if (!empty($request->name)) {
            $products = $products->where('products.name', 'like', '%' . $request->name . '%');
        }
        if (!empty($request->category_id)) {
            $products = $products->where('products.category_id', $request->category_id);
        }
        if (!empty($request->tags)) {
            $products = $products->join('product_tags', 'products.id', 'product_tags.product_id')
                ->join('tags', 'product_tags.tag_id', 'tags.id')
                ->where('tags.name', 'like', '%' . $request->tags . '%');
        }
        $products = $products
            ->groupBy('products.id')
            ->select('products.*')
            ->latest('products.created_at')
            ->paginate(Product::paginates);
        return $products;

    }

}
