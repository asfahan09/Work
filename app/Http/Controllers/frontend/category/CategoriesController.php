<?php

namespace App\Http\Controllers\frontend\category;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
  public function index($slug)
  {
    
    $subcategory = Subcategory::where('slug', $slug)->firstOrFail();

    $allproducts = Product::where('subcategory_id', $subcategory->id)->paginate(10);

    return view('frontend.layout.category.category', compact('allproducts', 'subcategory'));
  }
}
