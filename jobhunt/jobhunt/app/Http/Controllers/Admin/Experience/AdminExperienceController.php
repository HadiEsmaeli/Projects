<?php

namespace App\Http\Controllers\Admin\Experience;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    JobExperience,
    Job,
};

class AdminExperienceController extends Controller
{
    public function index()
    {
        $experience = JobExperience::get();
        return view('admin.experience.experience', compact( 'experience' ));
    }

    public function create()
    {
        return view('admin.experience.experience_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'experience' => 'required',
        ]);

        $obj = new JobExperience();
        $obj->experience = $req->experience;
        $obj->save();

        return redirect()->route('admin_experience')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $experience = JobExperience::where('id', $id)->first();

        return view('admin.experience.experience_edit', compact( 'experience' ));
    }

    public function update(Request $req, $id)
    {
        $obj = JobExperience::where('id', $id)->first();

        $req->validate([
            'experience' => 'required',
        ]);
        
        $obj->experience = $req->experience;
        $obj->update();

        return redirect()->route('admin_experience')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $job = Job::where('job_experience_id', $id)->count();

        if( $job > 0 ) {
            return redirect()->route('admin_experience')->with('error', 'you cant delete this experience!');
        }

        JobExperience::where('id', $id)->delete();
        return redirect()->route('admin_experience')->with('success', 'Data is deleted successfully!');
    }
}
