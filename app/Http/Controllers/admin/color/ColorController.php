<?php

namespace App\Http\Controllers\admin\color;

use App\Http\Controllers\Controller;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class ColorController extends Controller
{
    public function create()
    {
        return view('admin.layout.color.create');
    }
    public function list()
    {
        $ColorShow = Color::all();
        return view('admin.layout.color.list', compact('ColorShow'));
    }
    public function createProcess(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'code' => 'required'
        ]);
        if ($validator->passes()) {
            $color = new Color();
            $color->name = $request->name;
            $color->code = $request->code;
            $color->status = $request->has('status') ? 1 : 0;
            $color->save();
            return redirect()->route('admin.color.list')->with('success', 'Color Added Successfull');
        } else {
            return redirect()->route('admin.color.create')->withInput()->withErrors($validator);
        }
    }

    public function edit($id)
    {
        $colorEdit = Color::findOrFail($id);
        return view('admin.layout.color.edit', compact('colorEdit'));
    }
    public function update(Request $request, $id)
    {
        $updateColor = Color::findOrFail($id);
        $validator = Validator::make($request->all(), []);
        if ($validator->passes()) {
            $updateColor->name = $request->name;
            $updateColor->code = $request->code;
            $updateColor->status = $request->has('status') ? 1 : 0;
            $updateColor->save();
            return redirect()->route('admin.color.list')->with('success', 'Color Edit Successfull');
        } else {
            return redirect()->route('admin.color.edit')->withInput()->withErrors($validator);
        }
    }
    public function delete($id)
    {
        $DeleteData = Color::findOrFail($id);
        if ($DeleteData) {
            $DeleteData->delete();
            return redirect()->route('admin.color.list')->with('success', 'Color Delete');
        } else {
            return redirect()->route('admin.color.list')->withInput()->withErrors('error', 'something went wrong');
        }
    }
}
