<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Modules\Category\Models\Category;
use Modules\Contact\Entities\Contact;
use Modules\Product\Models\Product;
use Modules\Slider\Models\Slider;

class Home extends Controller
{
    public function index()
    {
        $contacts = Contact::all()->where('status', true);

        $categories = Category::where('parent_id', 0)->latest()->get();

        $products = Product::latest()->get();

        $sliders = Slider::latest()->get();

        return view('customer.index', compact('contacts', 'categories', 'products', 'sliders'));
    }


}
