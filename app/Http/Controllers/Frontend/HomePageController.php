<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Admin;
use App\Models\Setting;
use App\Models\Slider;
use App\Models\Social;
use App\Models\Testimonial;
use DB;

class HomePageController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        $slider = Slider::where('status', 1)->latest()->get();
        $testimonial = Testimonial::where('status', 1)->latest()->get();
        $category = Category::where('status', 1)->latest()->get();
        $product = Product::where('status', 1)->latest()->take(8)->get();
        return view('frontend.homePage', compact('setting', 'slider', 'testimonial', 'category', 'product'));
    }





    public function subCatProduct($id)
    {

        $subcat_product = Product::where('subcategory_id', $id)->take(8)->get();
        return view('frontend.subcat_product', compact('subcat_product'));

    }




    public function search(Request $request)
    {
        $query = $request->get('query');
        $products = Product::where('product_name', 'LIKE', "%{$query}%")->get();

        return response()->json($products);
    }

    public function searchResult(Request $request)
    {
        $query = $request->search;
        $products = Product::where('product_name', 'LIKE', "%{$query}%")->get();
        return view('frontend.layouts.search-result', compact('products', 'query'));
    }

    public function show($id)
    {
        $product = Product::find($id);
        // dd($product);
        return view('frontend.layouts.search_show', compact('product'));
    }



    public function details($id)
    {

        $details = Product::find($id);
        $relatedProduct = Product::where('id', '<>', $id)
            ->where('category_id', $details->$id)
            ->get();
        return view('frontend.details', compact('details', 'relatedProduct'));


    }


    public function contact()
    {

        return view('frontend.contact');
    }




}
