<?php

namespace App\Http\Controllers\Admin\Package;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    Package,
    Order,
};

class AdminPackageController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        return view('admin.package.package', compact( 'packages' ));
    }

    public function create()
    {
        return view('admin.package.package_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'package_name' => 'required',
            'package_price' => 'required|integer',
            'package_days' => 'required|integer',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required|integer',
            'total_allowed_featured_jobs' => 'required|integer',
            'total_allowed_photos' => 'required|integer',
            'total_allowed_videos' => 'required|integer',
        ]);

        $obj = new Package();        
        $obj->package_name = $req->package_name;
        $obj->package_price = $req->package_price;
        $obj->package_days = $req->package_days;
        $obj->package_display_time = $req->package_display_time;
        $obj->total_allowed_jobs = $req->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $req->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $req->total_allowed_photos;
        $obj->total_allowed_videos = $req->total_allowed_videos;
        $obj->save();

        return redirect()->route('admin_package')->with('success', 'Data save successfully!');
    }

    public function edit($id)
    {
        $package = Package::where('id', $id)->first();
        return view('admin.package.package_edit', compact( 'package' ));
    }

    public function update(Request $req, $id)
    {
        $obj = Package::where('id', $id)->first();

        $req->validate([
            'package_name' => 'required',
            'package_price' => 'required|integer',
            'package_days' => 'required|integer',
            'package_display_time' => 'required',
            'total_allowed_jobs' => 'required|integer',
            'total_allowed_featured_jobs' => 'required|integer',
            'total_allowed_photos' => 'required|integer',
            'total_allowed_videos' => 'required|integer',
        ]);
       
        $obj->package_name = $req->package_name;
        $obj->package_price = $req->package_price;
        $obj->package_days = $req->package_days;
        $obj->package_display_time = $req->package_display_time;
        $obj->total_allowed_jobs = $req->total_allowed_jobs;
        $obj->total_allowed_featured_jobs = $req->total_allowed_featured_jobs;
        $obj->total_allowed_photos = $req->total_allowed_photos;
        $obj->total_allowed_videos = $req->total_allowed_videos;
        $obj->update();

        return redirect()->route('admin_package')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $order = Order::where('package_id', $id)->count();

        if( $order > 0 ) {
            return redirect()->route('admin_package')->with('error', 'you cant delete this package!');
        }

        $item = Package::where('id', $id)->first();
        $item->delete();
        return redirect()->route('admin_package')->with('success', 'Data is deleted successfully!');
    }
}
