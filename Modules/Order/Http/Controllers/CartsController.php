<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Contact\Entities\Contact;
use Modules\Order\Entities\Cart;
use Modules\Order\Entities\Payment;

class CartsController extends Controller
{
    public function index(){
        if (Auth::user() == null)
            return redirect()->route('login');
        $contacts = Contact::all()->where('status', true);
        $cart = Cart::all()->where('user_id',Auth::user()->id)->where('state',1)[0];
        return view('order::cart.index',compact('contacts','cart'));
    }
    public function checkout(){
        if (Auth::user() == null)
            return redirect()->route('login');
        $contacts = Contact::all()->where('status', true);
        $payments = Payment::all()->where('state',true);
        $cart = Cart::all()->where('user_id',Auth::user()->id)->where('state',1)[0];
        return view('order::cart.checkout',compact('contacts','payments','cart'));
    }
    public function check_signed_in(){
        if (Auth::user() == null)
            return redirect()->route('login');
    }
}
