<?php

namespace Modules\Order\Http\Controllers;

use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Contact\Entities\Contact;
use Modules\Order\Entities\Cart;
use Modules\Order\Entities\CartItem;
use Modules\Order\Entities\Payment;

class CartsController extends Controller
{
    public function index()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $contacts = Contact::all()->where('status', true);
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        return view('order::cart.index', compact('contacts', 'cart'));
    }

    public function plus_product(Request $request)
    {
        if (Auth::user() == null)
            return response()->json(['status'=>'404']);
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        if ($cart == null) {
            $cart = Cart::create([
                'user_id' => Auth::user()->id,
                'state' => 1
            ]);
            CartItem::create([
                'cart_id' => $cart['id'],
                'product_id' => $request['id'],
                'quantity' => 1
            ]);
        } else {
            $cart_item_id = $cart->checkProduct($request['id']);
            if ($cart_item_id == null) {
                CartItem::create([
                    'cart_id' => $cart['id'],
                    'product_id' => $request['id'],
                    'quantity' => 1
                ]);
            } else {
                $cart_item = CartItem::find($cart_item_id);
                $cart_item['quantity'] += 1;
                $cart_item->save();
            }
        }
        return response()->json(['status'=>'200']);
    }

    public function end_checkout(Request $request){
        if (Auth::user() == null)
            return response()->json(['status'=>'404']);
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        if ($cart == null){
            return response()->json(['status'=>'302']);
        }
        $cart['state'] = 2;
        $cart['payment_id'] = $request['id'];
        $cart->save();
        return response()->json(['status'=>'200']);
    }

    public function minus_product(Request $request)
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        $cart_item_id = $cart->checkProduct($request['id']);
        $cart_item = CartItem::find($cart_item_id);
        if ($cart_item['quantity'] == 1){
            $cart_item->delete();
        }else {
            $cart_item['quantity'] -= 1;
            $cart_item->save();
        }
//        return redirect()->route("cart.index");
    }
    public function delete_product(Request $request)
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        $cart_item_id = $cart->checkProduct($request['id']);
        $cart_item = CartItem::find($cart_item_id);
        $cart_item->delete();
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $contacts = Contact::all()->where('status', true);
        $payments = Payment::all()->where('state', true);
        $tmp = Cart::all()->where('user_id', Auth::user()->id)->where('state', 1);
        $cart = null;
        foreach ($tmp as $caf) {
            $cart = $caf;
            break;
        }
        if ($cart == null){
            return redirect()->route('cart.index');
        }
        return view('order::cart.checkout', compact('contacts', 'payments', 'cart'));
    }

    public function check_signed_in()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
    }
}
