<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
  

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $categories = Category::take(2)->get();
        $products = Product::with(['galleries'])->take(8)->get();

        return view('pages.home',[
            'categories'=> $categories,
            'products'=> $products
        ]);
    }
}
