<?php

namespace Modules\Order\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Payment;

class AdminPaymentsController extends Controller
{
    public function index(){
        $payments = Payment::all();
        return view('order::payment.index', compact('payments'));
    }
    public function create(Request $request){
//        dd($request['payment_name']);
        $params = array(
            'payment_method_name'=>$request['payment_name'],
            'target_account'=> $request['payment_account']);
        $payment = Payment::create($params);
//        dd($params);
        return redirect()->route('payment.index', [$payment]);
    }
    public function state(Request $request){
//        dd($request['id']);
        $payment = Payment::find($request['id']);
        $payment['state'] = !$payment['state'];
        $payment->save();
    }
    public function delete(Request $request){
        $payment = Payment::find($request['id']);
        $payment->delete();
    }
    public function update(Request $request){
        $params = array('id'=> $request['id'],
            'payment_name'=>$request['payment_name'],
            'payment_value'=> $request['payment_account']);
        $payment = Payment::find($request['id']);
        $payment['payment_method_name']=$request['payment_name'];
        $payment['target_account']=$request['payment_account'];
        $payment->save();
        return redirect()->route('payment.index', [$payment]);
    }
}
