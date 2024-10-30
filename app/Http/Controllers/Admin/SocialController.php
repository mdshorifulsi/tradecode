<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use DB;
use App\Models\Social;
use File;

class SocialController extends Controller
{

    public function index()
    {
        // $category=Category::first();

        $social = DB::table('socials')->first();
        return view('admin.social.index', compact('social'));

    }

    public function update(Request $request, $id)
    {

        $social = Social::find($id);
        $social->facebook = $request->facebook;
        $social->twitter = $request->twitter;
        $social->youtube = $request->youtube;
        $social->linkedin = $request->linkedin;


        $social->save();
        Toastr::success('Social Link successfully updated:', 'update!');
        return redirect()->route('social.index');

    }
}
