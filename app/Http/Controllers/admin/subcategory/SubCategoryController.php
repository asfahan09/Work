<?php

namespace App\Http\Controllers\admin\subcategory;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class SubCategoryController extends Controller
{
    public function create()
    {
        $parentCategory = Category::all();
        return view('admin.layout.subcategory.create', compact('parentCategory'));
    }
    public function list()
    {
        $subcategoriesshow = Subcategory::with('category')->get();

        return view('admin.layout.subcategory.list', compact('subcategoriesshow'));
    }
    public function createProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required',

        ]);
        if ($validator->passes()) {
            $subcategory = new Subcategory();
            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->category_id = $request->category_id;
            $subcategory->description = $request->description;
            $subcategory->status = $request->has('status') ? 1 : 0;
            // image work 
            if ($request->hasFile('image')) {

                $image = $request->file('image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/subcategories'), $imageName);

                $subcategory->image = 'uploads/subcategories/' . $imageName;
            }
            $subcategory->save();
            return redirect()->route('admin.subcategory.list')
                ->with('success', 'Sub-Category Added Successfully');
        } else {
            return redirect()->route('admin.subcategory.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $subcategoryedit = Subcategory::findOrFail($id); 
        $parentCategory = Category::all();

        return view('admin.layout.subcategory.edit', compact('subcategoryedit','parentCategory'));
    }

        public function update(Request $request, $id)
    {
        $subcategory = Subcategory::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'category_id' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id,
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $subcategory->name = $request->name;
            $subcategory->slug = $request->slug;
            $subcategory->description = $request->description;
            $subcategory->category_id = $request->category_id;


            // Status
            $subcategory->status = $request->has('status') ? 1 : 0;

            // Image Upload
            if ($request->hasFile('image')) {

                //  old image delete (optional but best)
                if ($subcategory->image && file_exists(public_path($subcategory->image))) {
                    unlink(public_path($subcategory->image));
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/categories'), $imageName);

                $subcategory->image = 'uploads/categories/' . $imageName;
            }

            $subcategory->save();

            return redirect()->route('admin.subcategory.list')
                ->with('success', 'Category Updated Successfully');
        } 
        else {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    }
}
