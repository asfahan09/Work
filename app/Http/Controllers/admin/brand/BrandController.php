<?php

namespace App\Http\Controllers\admin\brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function create()
    {
        $ParentCategory = Category::all();
        $ChildCategory = Subcategory::all();
        return view('admin.layout.brand.create', compact('ChildCategory', 'ParentCategory'));
    }
    public function list()
    {
        $brandShow = Brand::with(['ParentCategory', 'ChildCategory'])->get();
        return view('admin.layout.brand.list', compact('brandShow'));
    }

    public function createProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',


        ]);

        if ($validator->passes()) {

            $brand = new Brand();
            $brand->name = $request->name;
            $brand->category_id = $request->category_id;
            $brand->subcategory_id = $request->subcategory_id;
            $brand->description = $request->description;
            $brand->status = $request->has('status') ? 1 : 0;

            //  Image Upload
            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/brand'), $imageName);

                $brand->image = 'uploads/brand/' . $imageName;
            }

            $brand->save();

            return redirect()->route('admin.brand.list')
                ->with('success', 'Brand Added Successfully');
        } else {
            return redirect()->route('admin.brand.create')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $editshow = Brand::findOrFail($id);
        $ParentCategory = Category::all();
        $ChildCategory = Subcategory::all();
        return view('admin.layout.brand.edit', compact('editshow', 'ParentCategory', 'ChildCategory'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'subcategory_id' => 'required',
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $brand->name = $request->name;
            $brand->category_id = $request->category_id;
            $brand->description = $request->description;
            $brand->category_id = $request->category_id;


            // Status
            $brand->status = $request->has('status') ? 1 : 0;

            // Image Upload
            if ($request->hasFile('image')) {

                //  old image delete (optional but best)
                if ($brand->image && file_exists(public_path($brand->image))) {
                    unlink(public_path($brand->image));
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/brand'), $imageName);

                $brand->image = 'uploads/brand/' . $imageName;
            }

            $brand->save();

            return redirect()->route('admin.brand.list')
                ->with('success', 'Brand Updated Successfully');
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function delete($id)
    {
        $brandDelete = Brand::findOrFail($id);

        //  Image delete first
        if ($brandDelete->image && file_exists(public_path($brandDelete->image))) {
            unlink(public_path($brandDelete->image));
        }

        //  Then delete record
        $brandDelete->delete();

        return redirect()->back()->with('success', 'Brand Deleted Successfully');
    }
}
