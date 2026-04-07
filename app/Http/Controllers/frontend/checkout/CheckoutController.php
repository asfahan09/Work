<?php

namespace App\Http\Controllers\frontend\checkout;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index(){
        return view('frontend.layout.checkout.checkout');
    }
}
