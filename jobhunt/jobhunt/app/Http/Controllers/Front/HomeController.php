<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    HomePageItems,
    WhyChooseItem,
    Testimonials,
    JobLocation,
    JobCategory,
    Setting,
    Post,
    Job,
};

class HomeController extends Controller
{
    public function index()
    {
        $job_category_for_search_section = JobCategory::orderBy('name', 'asc')->get();
        $job_location_for_search_section = JobLocation::orderBy('name', 'asc')->get();
        $job_categories = JobCategory::withCount('rJob')->orderBy('r_job_count', 'desc')->take(9)->get();
        $home_page_data = HomePageItems::where('id', 1)->first();
        $why_choose_items = WhyChooseItem::get();
        $testimonial = Testimonials::get();
        $post = post::take(3)->get();
        $job = Job::take(2)->get();


        return view('front.home', compact( 
            'job_category_for_search_section',
            'job_location_for_search_section',
            'why_choose_items',
            'home_page_data',
            'job_categories',
            'testimonial',
            'post',
            'job',
        ));
    }
}
