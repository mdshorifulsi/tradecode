<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Service;
use Brian2694\Toastr\Facades\Toastr;
use Str;
use File;
class ServiceController extends Controller
{
    public function index()
    {

        $service = Service::latest()->get();
        return view('admin.service.index', compact('service'));


    }



    public function store(Request $request)
    {
        $validated = $request->validate([
            'service_title' => 'required',
            'service_image' => 'required',
        ]);

        $service = new Service;
        $service->service_title = $request->service_title;

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $service->service_image = $request->file('service_image')->move("images/service_images", $name);
        }

        $service->save();
        Toastr::success('service  Add successfully :', 'success!');
        return redirect()->back();


    }

    public function edit($id)
    {
        $service = Service::find($id);
        return view('admin.service.edit', compact('service'));



    }


    public function update(Request $request, $id)
    {

        // $validated = $request->validate([
        //     'service_title' => 'required',
        //     'service_image' => 'required',
        // ]);

        $service = Service::find($id);
        $service->service_title = $request->service_title;

        if ($request->hasFile('service_image')) {
            $file = $request->file('service_image');
            $name = rand(11111, 99999) . '.' . $file->getClientOriginalExtension();
            $service->service_image = $request->file('service_image')->move("images/service_images", $name);
        }
        $service->save();
        Toastr::success('service Update successfully :', 'success!');
        return redirect()->route('service.index');




    }



    public function destroy($id)
    {
        $service = Service::find($id);
        if (File::exists($service->service_image)) {
            File::delete($service->service_image);
        }
        $service->delete();
        return redirect()->route('service.index');


    }


    public function inactive($id)
    {

        Service::where('id', $id)
            ->update(['status' => 0]);
        return response()->json([
            'status' => 'success',
        ]);

    }

    public function active($id)
    {

        Service::where('id', $id)
            ->update(['status' => 1]);
        return response()->json([
            'status' => 'success',
        ]);
    }
}
