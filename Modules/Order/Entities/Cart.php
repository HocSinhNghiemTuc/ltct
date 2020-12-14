<?php

namespace Modules\Order\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Cart extends Model
{
    protected $fillable = ['id','user_id','state','create_at', 'feature_image_path'];
    protected $table = 'carts';
    public function totalBill(){
        $id = $this['id'];
        $sqlQuery = "SELECT sum(quantity*price) as value FROM carts c join cart_items i on (c.id = i.cart_id) join products p on (p.id = i.product_id) where c.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        foreach ($result as $tmp){
            return $tmp->value;
        }
        return null;
    }
    public function products(){
        $id = $this['id'];
        $sqlQuery = "SELECT p.feature_image_path, p.id, p.name, p.price, i.quantity FROM carts c join cart_items i on (c.id = i.cart_id) join products p on (p.id = i.product_id) where c.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        return $result;
    }
    public function state(){
        $id = $this['id'];
        $sqlQuery = "SELECT state_name FROM orderstates a join carts b on (a.id = b.state) where b.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        foreach ($result as $tmp){
            return $tmp->state_name;
        }
        return null;
    }
    public function paymentName(){
        $id = $this['id'];
        $sqlQuery = "SELECT payment_method_name FROM carts a join payments b on (a.payment_id = b.id) where a.id = $id";
        $result = DB::select(DB::raw($sqlQuery));
        if ($result == null)
            return 'Undefine';

        foreach ($result as $tmp){
            return $tmp->payment_method_name;
        }
        return null;
    }

    public function checkProduct($id){
        $cart_item = CartItem::all()->where('product_id',$id)->where('cart_id',$this['id']);
        if (!isset($cart_item)){
            return null;
        }
        $cart = null;
        foreach ($cart_item as $caf) {
            $cart = $caf;
            break;
        }
        if (!isset($cart)){
            return null;
        }
        return $cart['id'];
    }
}
