<?php

namespace App\Http\Controllers\Admin\JobType;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    JobType,
    Job,
};

class AdminJobTypeController extends Controller
{
    public function index()
    {
        $job_type = JobType::get();
        return view('admin.jobtype.job_type', compact( 'job_type' ));
    }

    public function create()
    {
        return view('admin.jobtype.job_type_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'type' => 'required',
        ]);

        $obj = new JobType();
        $obj->type = $req->type;
        $obj->save();

        return redirect()->route('admin_job_type')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $job_type = JobType::where('id', $id)->first();

        return view('admin.jobtype.job_type_edit', compact( 'job_type' ));
    }

    public function update(Request $req, $id)
    {
        $obj = JobType::where('id', $id)->first();

        $req->validate([
            'type' => 'required',
        ]);
        
        $obj->type = $req->type;
        $obj->update();

        return redirect()->route('admin_job_type')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $job = Job::where('job_type_id', $id)->count();

        if( $job > 0 ) {
            return redirect()->route('admin_job_type')->with('error', 'you cant delete this type!');
        }

        JobType::where('id', $id)->delete();
        return redirect()->route('admin_job_type')->with('success', 'Data is deleted successfully!');
    }
}
