<?php

namespace App\Http\Controllers\Admin\JobLocation;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    JobLocation,
    Job,
};

class AdminJobLocationController extends Controller
{
    public function index()
    {
        $job_location = JobLocation::get();
        return view('admin.joblocation.job_location', compact( 'job_location' ));
    }

    public function create()
    {
        return view('admin.joblocation.job_location_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
        ]);

        $obj = new JobLocation();
        $obj->name = $req->name;
        $obj->save();

        return redirect()->route('admin_job_location')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $job_location = JobLocation::where('id', $id)->first();

        return view('admin.joblocation.job_location_edit', compact( 'job_location' ));
    }

    public function update(Request $req, $id)
    {
        $obj = JobLocation::where('id', $id)->first();

        $req->validate([
            'name' => 'required',
        ]);
        
        $obj->name = $req->name;
        $obj->update();

        return redirect()->route('admin_job_location')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $job = Job::where('job_location_id', $id)->count();

        if( $job > 0 ) {
            return redirect()->route('admin_job_location')->with('error', 'you cant delete this location!');
        }

        JobLocation::where('id', $id)->delete();
        return redirect()->route('admin_job_location')->with('success', 'Data is deleted successfully!');
    }
}
