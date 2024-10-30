<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\SubCategory;
use Brian2694\Toastr\Facades\Toastr;
use Str;
use File;

class SubCategoryController extends Controller
{
    public function index()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::latest()->get();
        return view('admin.subcategory.index', compact('subcategory', 'category'));


    }

    public function store(Request $request)
    {


        $validated = $request->validate(
            [
                'category_id' => 'required|integer',
                'sub_category_name' => 'required',
            ],
            [
                'category_id.required' => 'category name is required',
                'sub_category_name.required' => 'sub-category name is required',
            ]

        );


        $subcategory = new SubCategory;
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->category_id = $request->category_id;



        $subcategory->save();
        Toastr::success('Sub Category Add successfully :', 'success!');
        return redirect()->route('subcategory.index');


    }

    public function edit($id)
    {

        $subcategory = SubCategory::find($id);
        $category = Category::get();
        return view('admin.subcategory.edit', compact('subcategory', 'category'));

    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate(
            [
                'category_id' => 'required|integer',
                'sub_category_name' => 'required',
            ],
            [
                'category_id.required' => 'category name is required',
                'sub_category_name.required' => 'sub-category name is required',
            ]

        );

        $subcategory = SubCategory::find($id);
        $subcategory->sub_category_name = $request->sub_category_name;
        $subcategory->category_id = $request->category_id;


        $subcategory->save();
        Toastr::success('Sub Category Update successfully :', 'success!');
        return redirect()->route('subcategory.index');


    }





    public function destroy($id)
    {
        $subcategory = SubCategory::find($id);
        $subcategory->delete();
        return redirect()->route('subcategory.index');


    }


    public function inactive($id)
    {

        SubCategory::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        SubCategory::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }
}
