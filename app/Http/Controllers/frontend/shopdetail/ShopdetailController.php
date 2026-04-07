<?php

namespace App\Http\Controllers\frontend\shopdetail;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopdetailController extends Controller
{
  public function shopdetail($slug)
{
    $product = Product::where('slug', $slug)->firstOrFail();
    return view('frontend.layout.shopdetail.shopdetail', compact('product'));
}
}
