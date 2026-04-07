<?php

namespace App\Http\Controllers\admin\product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function create()
    {
        $ParentCategory = Category::all();
        $ChildCategory = Subcategory::all();
        $BrandsShow = Brand::all();
        $colors = Color::where('status', 1)->get();
        return view('admin.layout.product.create', compact('ChildCategory', 'ParentCategory', 'BrandsShow', 'colors'));
    }

    public function list()
    {

        $products = Product::with(['category', 'subcategory', 'ProductImage'])->get();
        return view('admin.layout.product.list', compact('products'));
    }

    public function createProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);

        if ($validator->passes()) {

            $product = new Product();
            $product->name = $request->name;
            $product->category_id = $request->category_id;
            $product->subcategory_id = $request->subcategory_id;
            $product->brand = $request->brand;
            $product->slug = $request->name;
            $product->small_description = $request->small_description;
            $product->description = $request->description;
            $product->original_price = $request->original_price;
            $product->selling_price = $request->selling_price;
            $product->quantity = $request->quantity;
            $product->status = $request->has('status') ? 1 : 0;
            $product->trending = $request->has('trending') ? 1 : 0;

            $product->save();

            //  Multiple Images

            if ($request->hasFile('image')) {

                //  product ka folder name (slug bana lo)
                $folderName = Str::slug($product->name);

                $path = public_path('uploads/products/' . $folderName);

                //  agar folder exist nahi karta to create karo
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                //  old images delete
                foreach ($product->productImages as $img) {
                    if (file_exists(public_path($img->image))) {
                        unlink(public_path($img->image));
                    }
                    $img->delete();
                }

                //  new images upload
                foreach ($request->file('image') as $image) {

                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                    $image->move($path, $filename);

                    ProductImage::create([
                        'product_id' => $product->id,
                        'image' => 'uploads/products/' . $folderName . '/' . $filename,
                    ]);
                }
            }
            //  color product

            if ($request->colors) {
                foreach ($request->colors as $key => $colorId) {
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $colorId,
                        'quantity' => $request->quantityy[$key] ?? 0,
                    ]);
                }
            }

            return redirect()->route('admin.product.list')->with('success', 'Product Added successfully');
        }

        return redirect()->route('admin.product.create')->withInput()->withErrors($validator);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $subcategories = Subcategory::all();
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::all();
        // product ke selected colors + quantity
        $product_colors = $product->productColors->keyBy('color_id');

        return view('admin.layout.product.edit', compact(
            'product',
            'categories',
            'subcategories',
            'brands',
            'colors',
            'product_colors'
        ));
    }
    public function update(Request $request, $id)
    {
        $productUpdate = Product::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'brand' => 'required',
            'small_description' => 'required',
            'description' => 'required',
            'original_price' => 'required|numeric',
            'selling_price' => 'required|numeric',
            'quantity' => 'required|integer',
        ]);
        if ($validator->passes()) {
            $productUpdate->name = $request->name;
            $productUpdate->category_id = $request->category_id;
            $productUpdate->subcategory_id = $request->subcategory_id;
            $productUpdate->brand = $request->brand;
            $productUpdate->slug = $request->slug;
            $productUpdate->small_description = $request->small_description;
            $productUpdate->description = $request->description;
            $productUpdate->original_price = $request->original_price;
            $productUpdate->selling_price = $request->selling_price;
            $productUpdate->quantity = $request->quantity;
            $productUpdate->status = $request->has('status') ? 1 : 0;
            $productUpdate->trending = $request->has('trending') ? 1 : 0;
            $productUpdate->save();



            if ($request->hasFile('image')) {

                //  product ka folder name (slug bana lo)
                $folderName = Str::slug($productUpdate->name);

                $path = public_path('uploads/products/' . $folderName);

                //  agar folder exist nahi karta to create karo
                if (!file_exists($path)) {
                    mkdir($path, 0777, true);
                }

                //  old images delete
                foreach ($productUpdate->productImages as $img) {
                    if (file_exists(public_path($img->image))) {
                        unlink(public_path($img->image));
                    }
                    $img->delete();
                }

                //  new images upload
                foreach ($request->file('image') as $image) {

                    $filename = uniqid() . '.' . $image->getClientOriginalExtension();

                    $image->move($path, $filename);

                    ProductImage::create([
                        'product_id' => $productUpdate->id,
                        'image' => 'uploads/products/' . $folderName . '/' . $filename,
                    ]);
                }
            }

            // color 
            $selectedColors = $request->colors ?? [];


            $productUpdate->productColors()
                ->whereNotIn('color_id', $selectedColors)
                ->delete();


            if (!empty($selectedColors)) {
                foreach ($selectedColors as $colorId) {

                    $productUpdate->productColors()->updateOrCreate(
                        [
                            'product_id' => $productUpdate->id,
                            'color_id' => $colorId
                        ],
                        [
                            'quantity' => $request->quantityy[$colorId] ?? 0
                        ]
                    );
                }
            }
            return redirect()->route('admin.product.list')->with('success', "Product Update");
        } else {

            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function delete($id)
    {
        $DeleteProd = Product::findOrFail($id);
        if ($DeleteProd->productImages) {
            foreach ($DeleteProd->productImages as $image) {
                if (File::exists($image->image)) {
                    File::delete($image->image);
                }
            }
        }
        $DeleteProd->delete();

        return redirect()->route('admin.product.list')->with('success', 'Product Deleted');
    }
}
