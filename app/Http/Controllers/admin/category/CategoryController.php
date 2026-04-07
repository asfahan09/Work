<?php

namespace App\Http\Controllers\admin\category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    public function create()
    {
        return view('admin.layout.category.create');
    }


    public function list()
    {
        $showCategory = Category::latest()->get();
        return view('admin.layout.category.list', compact('showCategory'));
    }

    public function createProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug',
            'description' => 'required',

        ]);

        if ($validator->passes()) {

            $category = new Category();
            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;

            //  Status
            $category->status = $request->has('status') ? 1 : 0;

            //  Image Upload
            if ($request->hasFile('image')) {
                $image = $request->file('image');

                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/categories'), $imageName);

                $category->image = 'uploads/categories/' . $imageName;
            }

            $category->save();

            return redirect()->route('admin.category.list')
                ->with('success', 'Category Added Successfully');
        } else {
            return redirect()->route('admin.category.create')
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $categoryedit = Category::findOrFail($id);
        return view('admin.layout.category.edit', compact('categoryedit'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'slug' => 'required|unique:categories,slug,' . $id,
            'description' => 'required',
        ]);

        if ($validator->passes()) {

            $category->name = $request->name;
            $category->slug = $request->slug;
            $category->description = $request->description;

            // Status
            $category->status = $request->has('status') ? 1 : 0;

            // Image Upload
            if ($request->hasFile('image')) {

                //  old image delete (optional but best)
                if ($category->image && file_exists(public_path($category->image))) {
                    unlink(public_path($category->image));
                }

                $image = $request->file('image');
                $imageName = time() . '.' . $image->getClientOriginalExtension();

                $image->move(public_path('uploads/categories'), $imageName);

                $category->image = 'uploads/categories/' . $imageName;
            }

            $category->save();

            return redirect()->route('admin.category.list')
                ->with('success', 'Category Updated Successfully');
        } else {
            return redirect()->back()
                ->withInput()
                ->withErrors($validator);
        }
    }

    public function delete($id)
    {
        $category = Category::findOrFail($id);

        //  Image delete first
        if ($category->image && file_exists(public_path($category->image))) {
            unlink(public_path($category->image));
        }

        //  Then delete record
        $category->delete();

        return redirect()->back()->with('success', 'Category Deleted Successfully');
    }
}
