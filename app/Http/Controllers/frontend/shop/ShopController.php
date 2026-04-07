<?php

namespace App\Http\Controllers\frontend\shop;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function shop()
    {

        return view('frontend.layout.shop.shop');
    }
}
