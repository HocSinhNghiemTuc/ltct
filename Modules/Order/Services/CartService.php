<?php
namespace Modules\Order\Services;
use Modules\Order\Entities\Cart;
use Modules\Order\Entities\CartItem;


class CartService{
    public function all(){
       return Cart::all();
    }
    public function index($user_id){
        $tmp = Cart::all()->where('user_id', $user_id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        return $cart;
    }
    public function getOrder($order_id){
        return Cart::find($order_id);
    }
    public function cancelOrder($order_id){
        $order = $this->getOrder($order_id);
        $order->state = 3;
        $order->save();
    }
    public function cartHistory($user_id){
        return Cart::all()->where('user_id', $user_id)->where('state', "!=",1);
    }
    public function addProduct($user_id,$product_id){
        $cart = $this->index($user_id);
        if ($cart == null) {
            $cart = Cart::create([
                'user_id' => $user_id,
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
    public function end_checkout($user_id,$payment_id){
        $cart = $this->index($user_id);
        if ($cart == null){
            return false;
        }
        $cart['state'] = 2;
        $cart['payment_id'] = $payment_id;
        $cart->save();
        return true;
    }

    public function minus_product($user_id,$product_id)
    {
        $cart = $this->index($user_id);
        $cart_item_id = $cart->checkProduct($product_id);
        $cart_item = CartItem::find($cart_item_id);
        if ($cart_item['quantity'] == 1){
            $cart_item->delete();
        }else {
            $cart_item['quantity'] -= 1;
            $cart_item->save();
        }
    }
    public function delete_product($user_id,$product_id)
    {
        $cart = $this->index($user_id);
        $cart_item_id = $cart->checkProduct($product_id);
        $cart_item = CartItem::find($cart_item_id);
        $cart_item->delete();
    }
}
