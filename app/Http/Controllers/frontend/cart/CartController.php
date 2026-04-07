<?php

namespace App\Http\Controllers\frontend\cart;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class CartController extends Controller
{
public function index(){
      $showcartData = Cart::where('user_id', Auth::id())->get();

    return view('frontend.layout.cart.cart', compact('showcartData'));
    }
}
