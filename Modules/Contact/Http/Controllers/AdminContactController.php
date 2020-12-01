<?php

namespace Modules\Contact\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Contact\Entities\Contact;

class AdminContactController extends Controller
{
    public function index(){
        $contacts = Contact::all();
        return view('contact::contact', compact('contacts'));
    }
    public function create(Request $request){
        $params = array('id'=> $request['id'],
            'contact_name'=>$request['contact_name'],
            'contact_value'=> $request['contact_value'],
            'icon'=>$request['contact_icon'],
            'color'=>$request['contact_color']);
        $contact = Contact::create($params);
        return redirect()->route('contact.index', [$contact]);
    }
    public function state(Request $request){
        $contact = Contact::find($request['id']);
        $contact['status'] = !$contact['status'];
        $contact->save();
    }
    public function show(Request $request){
        $contact = Contact::find($request['id']);
        $contact['show?'] = !$contact['show?'];
        $contact->save();
    }
    public function delete(Request $request){
        $contact = Contact::find($request['id']);
        $contact->delete();
    }
    public function update(Request $request){
        $params = array('id'=> $request['id'],
            'contact_name'=>$request['contact_name'],
            'contact_value'=> $request['contact_value'],
            'icon'=>$request['contact_icon'],
            'color'=>$request['contact_color']);
        $contact = Contact::find($request['id']);
        $contact['contact_name']=$request['contact_name'];
        $contact['contact_value']=$request['contact_value'];
        $contact['icon']=$request['contact_icon'];
        $contact['color']=$request['contact_color'];
        $contact->save();
        return redirect()->route('contact.index', [$contact]);
    }
}
