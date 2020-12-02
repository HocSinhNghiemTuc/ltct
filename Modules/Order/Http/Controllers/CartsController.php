<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;

class CartsController extends Controller
{
    public function index(){
        $contacts = Contact::all()->where('status', true);
        return view('order::cart.index',compact('contacts'));
    }
}
