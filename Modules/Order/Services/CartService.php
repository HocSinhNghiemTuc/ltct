<?php
namespace Modules\Order\Services;
use Illuminate\Support\Facades\Auth;
use Modules\Order\Entities\Cart;
use Modules\Order\Entities\CartItem;


class CartService{
    public function index($user_id){
        $tmp = Cart::all()->where('user_id', $user_id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        return $cart;
    }
    public function addProduct($user_id,$product_id){
        $cart = $this->index($user_id);
        if ($cart == null) {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'state' => 1
            ]);
            CartItem::create([
                'cart_id' => $cart['id'],
                'product_id' => $product_id,
                'quantity' => 1
            ]);
        } else {
            $cart_item_id = $cart->checkProduct($product_id);
            if ($cart_item_id == null) {
                CartItem::create([
                    'cart_id' => $cart['id'],
                    'product_id' => $product_id,
                    'quantity' => 1
                ]);
            } else {
                $cart_item = CartItem::find($cart_item_id);
                $cart_item['quantity'] += 1;
                $cart_item->save();
            }
        }
    }

}
