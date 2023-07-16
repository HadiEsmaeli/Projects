<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageJobCategoryItem;

class AdminJobCategoryPageController extends Controller
{
    public function index()
    {
        $page_job_category_data = PageJobCategoryItem::where('id', 1)->first();

        return view('admin.page_jobcategory', compact( 'page_job_category_data' ));
    }

    public function update(Request $req)
    {
        $job_category_page_data = PageJobCategoryItem::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
        ]);

        $job_category_page_data->heading = $req->heading;
        $job_category_page_data->title = $req->title;
        $job_category_page_data->meta_description = $req->meta_description;

        $job_category_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
