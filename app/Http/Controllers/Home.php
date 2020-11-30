<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Contact\Entities\Contact;

class Home extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('customer.index',compact('contacts'));
    }
}
