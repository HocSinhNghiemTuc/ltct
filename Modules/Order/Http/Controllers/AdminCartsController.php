<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Cart;

class AdminCartsController extends Controller
{
    public function index(){
        $carts = Cart::all()->where('state',"<>",1);
        return view('order::cart.admin_index', compact('carts'));
    }
    public function cancelOrder(Request $request){
        $id = $request['id'];
        $cart = Cart::find($id);
        $cart->state = 3;
        $cart->save();
        $carts = Cart::all()->where('state',"<>",1);
        return view('order::cart.admin_index', compact('carts'));
    }
    public function completeOrder(Request $request){
        $id = $request['id'];
        $cart = Cart::find($id);
        $cart->state = 4;
        $cart->save();
        $carts = Cart::all()->where('state',"<>",1);
        return view('order::cart.admin_index', compact('carts'));
    }
}
