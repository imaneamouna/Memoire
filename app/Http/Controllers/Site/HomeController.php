<?php

namespace App\Http\Controllers\Site;

use App\Models\product;
use App\Models\category;
use App\Models\setting;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = product::orderBy('id')->limit(5)->get();
        $categories = category::orderBy('id')->limit(5)->get();
        // $category = category::orderBy('id')->limit(5)->get();
        return view('User.our_products.product', compact('categories', 'products'));
    }


    public function setings(setting $setting)
    {
        $setting = setting::all();
        return view('User.layout.layout', compact('setting'));
    }


    public function show($id)
    {
        $product = product::with('images', 'category')->find($id);
        
        // dd($product->image);
        // $images =$product->images()->where('id',$id);
        return view('User.our_products.show_details', compact('product'));
    }


    public function home()
    {
        $categories = category::orderBy('id')->limit(5)->get();
        return view('User.our_products.home', compact('categories'));
    }

    public function contact()
    {
        $categories = category::orderBy('id')->limit(5)->get();
        return view('User.our_products.contactUs', compact('categories'));
    }

    // public function redirectTo()
    // {
    //     return view('User.our_products.product');
    // }
}
