<?php

namespace App\Http\Controllers\Admin\JobCategory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CandidateBookmark,
    JobCategory,
    Job,
};

class AdminJobCategoryController extends Controller
{
    public function index()
    {
        $job_categories = JobCategory::get();
        return view('admin.jobcategory.job_category', compact( 'job_categories' ));
    }

    public function create()
    {
        return view('admin.jobcategory.job_category_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);

        $obj = new JobCategory();
        $obj->name = $req->name;
        $obj->icon = $req->icon;
        $obj->save();

        return redirect()->route('admin_job_category')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $job_category = JobCategory::where('id', $id)->first();

        return view('admin.jobcategory.job_category_edit', compact( 'job_category' ));
    }

    public function update(Request $req, $id)
    {
        $obj = JobCategory::where('id', $id)->first();

        $req->validate([
            'name' => 'required',
            'icon' => 'required',
        ]);
        
        $obj->name = $req->name;
        $obj->icon = $req->icon;
        $obj->update();

        return redirect()->route('admin_job_category')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $job = Job::where('job_category_id', $id)->count();
        $bookmark = CandidateBookmark::where('job_id', $id)->count();

        if( $job > 0 || $bookmark > 0 ) {
            return redirect()->route('admin_job_category')->with('error', 'you cant delete this category!');
        }

        JobCategory::where('id', $id)->delete();
        return redirect()->route('admin_job_category')->with('success', 'Data is deleted successfully!');
    }
}
