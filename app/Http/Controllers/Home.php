<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Modules\Category\Models\Category;
use Modules\Contact\Entities\Contact;

class Home extends Controller
{
    public function index()
    {
        $contacts = Contact::all()->where('status', true);

        $categories = Category::where('parent_id', 0)->latest()->get();

        return view('customer.index', compact('contacts', 'categories'));
    }
}
