<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;
use App\Models\PageJobCategoryItem;

class JobCategoryController extends Controller
{
    public function categories()
    {
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count', 'desc')->get();

        $page_job_category_item = PageJobCategoryItem::where('id', 1)->first();

        return view('front.job_categories', compact( 'job_categories', 'page_job_category_item' ));
    }
}
