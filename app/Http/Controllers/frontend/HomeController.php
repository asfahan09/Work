<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Category::where('status', 1)->get();
        $subcategory = Subcategory::withCount('products')->where('status', 1)->limit(12)->get();
        $recentprod = Product::where('status', 1)->latest()->limit(8)->get();
        return view('frontend.layout.index', compact('sliders', 'subcategory', 'recentprod'));
    }
}
