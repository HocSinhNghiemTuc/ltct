<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Contact\Entities\Contact;
use Modules\Order\Entities\Cart;
use Modules\Order\Entities\CartItem;
use Modules\Order\Entities\Payment;
use Modules\Order\Services\CartService;
//use Services\CartService;

class CartsController extends Controller
{
    protected $cartService;
    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $cart = $this->cartService->index(Auth::user()->id);
        $contacts = Contact::all();
        return view('order::cart.index', compact('contacts', 'cart'));
    }

    public function plus_product(Request $request)
    {
        if (Auth::user() == null)
            return response()->json(['status'=>'404']);
        $this->cartService->addProduct(Auth::user()->id,$request['id']);
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
