<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;
use Modules\Order\Entities\Payment;

class CartsController extends Controller
{
    public function index(){
        $contacts = Contact::all()->where('status', true);
        return view('order::cart.index',compact('contacts'));
    }
    public function checkout(){
        $contacts = Contact::all()->where('status', true);
        $payments = Payment::all()->where('state',true);
        return view('order::cart.checkout',compact('contacts','payments'));
    }
}
