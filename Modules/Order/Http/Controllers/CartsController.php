<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\Contact\Entities\Contact;
use Modules\Order\Services\CartService;
use Modules\Order\Services\PaymentService;

class CartsController extends Controller
{
    protected $cartService;
    protected $paymentService;
    public function __construct(CartService $cartService,PaymentService $paymentService)
    {
        $this->cartService = $cartService;
        $this->paymentService = $paymentService;
    }
    public function cartHistory(Request $request){
        if(Auth::user() == null) {
            return redirect()->route('login');
        }
        $contacts = Contact::all();
        $orders = $this->cartService->cartHistory(Auth::user()->id);
        return view('order::cart.history',compact('orders','contacts'));
    }
    public function index()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $cart = $this->cartService->index(Auth::user()->id);
        $contacts = Contact::all();
        return view('order::cart.index', compact('contacts', 'cart'));
    }
    public function cancel(Request $request){
        if (Auth::user() == null)
            return response()->json(['status'=>'404']);
        $this->cartService->cancelOrder($request['id']);
        $contacts = Contact::all();
        $orders = $this->cartService->cartHistory(Auth::user()->id);
        return view('order::cart.history',compact('orders','contacts'));
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
        if (!$this->cartService->end_checkout(Auth::user()->id,$request['id'])){
            return response()->json(['status'=>'302']);
        }
        return response()->json(['status'=>'200']);
    }

    public function minus_product(Request $request)
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $this->cartService->minus_product(Auth::user()->id,$request['id']);
    }
    public function delete_product(Request $request)
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $this->cartService->delete_product(Auth::user()->id,$request['id']);
        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        if (Auth::user() == null)
            return redirect()->route('login');
        $contacts = Contact::all()->where('status', true);
        $payments = $this->paymentService->index();
        $cart = $this->cartService->index(Auth::user()->id);
        if ($cart == null){
            return redirect()->route('cart.index');
        }
        return view('order::cart.checkout', compact('contacts', 'payments', 'cart'));
    }
}
