<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class CartItem extends Model
{


    protected $fillable = ['cart_id','product_id','quantity','price'];
    protected $table = 'cart_items';

    public static function updatePrice(){
        $sqlQuery = "UPDATE cart_items set price = (select price from products WHERE products.id = cart_items.product_id) WHERE cart_items.cart_id in ( SELECT carts.id from carts where carts.state = 1)";
        DB::select(DB::raw($sqlQuery));
    }
    public static function deleteProduct(){
        $sqlQuery = "DELETE FROM cart_items WHERE product_id in (SELECT id from products WHERE products.deleted_at is not null) and cart_id in ( SELECT carts.id from carts where carts.state = 1)";
        DB::select(DB::raw($sqlQuery));
    }
}
