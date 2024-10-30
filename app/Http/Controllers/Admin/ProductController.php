<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\Brand;

use App\Models\Admin;
use Brian2694\Toastr\Facades\Toastr;
use Str;
use DB;
use File;
class ProductController extends Controller
{
    public function index()
    {


        $category = Category::latest()->get();
        $subcategory = SubCategory::get();
        $brand = Brand::latest()->get();
        $product = Product::with('category', 'brand', 'subcategory')->latest()->get();

        return view('admin.product.index', compact('category', 'subcategory', 'brand', 'product'));




    }

    public function create()
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::get();
        $brand = Brand::latest()->get();

        return view('admin.product.create', compact('category', 'subcategory', 'brand'));

    }




    public function store(Request $request)
    {


        $validated = $request->validate(
            [
                'product_name' => 'required',
                'category_id' => 'required|integer',
                'subcategory_id' => 'required|integer',
                'brand_id' => 'required|integer',
                'unit_price' => 'required',
                'discount' => 'required',
                'discount_type' => 'required',
                'stock_quantity' => 'required',
                'product_unit' => 'required',
                'product_sku' => 'required',
                'product_model' => 'required',
                'thumbnail_image' => 'required',



            ],
            [
                'product_name.required' => 'product name is required',
                'category_id.required' => 'category name is required',
                'subcategory_id.required' => 'sub-category name is required',
                'brand_id.required' => 'Brand name is required',
                'unit_price.required' => 'Unit price is required',
                'discount.required' => 'Discount is required',
                'discount_type.required' => 'discount type is required',
                'stock_quantity.required' => 'stock quantity  is required',
                'product_unit.required' => 'product unit  is required',
                'product_sku.required' => 'product sku  is required',
                'product_model.required' => 'product model name is required',
                'thumbnail_image.required' => 'product Image name is required',
            ]

        );


        $product = new Product;
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;

        $product->unit_price = $request->unit_price;

        $product->discount = $request->discount;
        $product->discount_type = $request->discount_type;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->product_unit = $request->product_unit;
        $product->product_sku = $request->product_sku;
        $product->product_model = $request->product_model;
        $product->today_deal = $request->today_deal;




        if (isset($request->status)) {
            $product->status = 1;

        } else {
            $product->status = 0;
        }


        if ($request->discount_type == 'flat') {

            $product->best_price = ($request->unit_price * $request->product_unit) - $request->discount;

        } else {

            $product->best_price = (($request->unit_price) - (($request->unit_price * $request->discount) / 100)) * ($request->product_unit);

        }



        $product->admin_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->thumbnail_image = $request->file('thumbnail_image')->move("images/product_images", $name);
        }

        // dd($product);
        $product->save();

        Toastr::success('Product Add successfully :', 'success!');
        return redirect()->route('product.index');




    }

    public function edit($id)
    {
        $category = Category::latest()->get();
        $subcategory = SubCategory::get();
        $brand = Brand::latest()->get();
        $product = Product::find($id);
        return view('admin.product.edit', compact('category', 'subcategory', 'brand', 'product'));

    }

    public function update(Request $request, $id)
    {
        // $validated = $request->validate(
        //     [
        //         'product_name' => 'required',
        //         'category_id' => 'required|integer',
        //         'subcategory_id' => 'required|integer',
        //         'brand_id' => 'required|integer',
        //         'unit_price' => 'required',
        //         'discount' => 'required',
        //         'discount_type' => 'required',
        //         'stock_quantity' => 'required',
        //         'product_unit' => 'required',
        //         'product_sku' => 'required',
        //         'product_model' => 'required',
        //         'thumbnail_image' => 'required',



        //     ],
        //     [
        //         'product_name.required' => 'product name is required',
        //         'category_id.required' => 'category name is required',
        //         'subcategory_id.required' => 'sub-category name is required',
        //         'brand_id.required' => 'Brand name is required',
        //         'unit_price.required' => 'Unit price is required',
        //         'discount.required' => 'Discount is required',
        //         'discount_type.required' => 'discount type is required',
        //         'stock_quantity.required' => 'stock quantity  is required',
        //         'product_unit.required' => 'product unit  is required',
        //         'product_sku.required' => 'product sku  is required',
        //         'product_model.required' => 'product model name is required',
        //         'thumbnail_image.required' => 'product Image name is required',
        //     ]

        // );

        $product = Product::find($id);
        $product->product_name = $request->product_name;
        $product->product_slug = Str::slug($request->product_name);
        $product->category_id = $request->category_id;
        $product->subcategory_id = $request->subcategory_id;
        $product->brand_id = $request->brand_id;

        $product->unit_price = $request->unit_price;

        $product->discount = $request->discount;
        $product->stock_quantity = $request->stock_quantity;
        $product->description = $request->description;
        $product->product_unit = $request->product_unit;
        $product->product_sku = $request->product_sku;
        $product->product_model = $request->product_model;
        $product->today_deal = $request->today_deal;
        $product->discount_type = $request->discount_type;



        if (isset($request->status)) {
            $product->status = 1;

        } else {
            $product->status = 0;
        }


        if ($request->discount_type == 'flat') {

            $product->best_price = ($request->unit_price * $request->product_unit) - $request->discount;

        } else {

            $product->best_price = (($request->unit_price) - (($request->unit_price * $request->discount) / 100)) * ($request->product_unit);

        }



        $product->admin_id = \Auth::guard('admin')->user()->id;

        if ($request->hasFile('thumbnail_image')) {
            $file = $request->file('thumbnail_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $product->thumbnail_image = $request->file('thumbnail_image')->move("images/product_images", $name);
        }

        // dd($product);
        $product->save();

        Toastr::success('Product Update successfully :', 'success!');
        return redirect()->route('product.index');



    }



    public function destroy($id)
    {
        $product = Product::find($id);
        if (File::exists($product->thumbnail_image)) {
            File::delete($product->thumbnail_image);
        }
        $product->delete();
        return redirect()->route('product.index');


    }


    public function inactive($id)
    {

        Product::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Product::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }



    // json data return
    public function getSubcategory($category_id)
    {
        $subcategory = DB::table('sub_categories')->where('category_id', $category_id)->get();
        return response()->json($subcategory);

    }



}
