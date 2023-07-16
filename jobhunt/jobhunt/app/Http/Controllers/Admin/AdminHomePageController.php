<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\HomePageItems;

class AdminHomePageController extends Controller
{
    public function index()
    {
        $page_home_data = HomePageItems::where('id', 1)->first();

        return view('admin.page_home', compact( 'page_home_data' ));
    }

    public function update(Request $req)
    {
        $home_page_data = HomePageItems::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
            'text' => 'required',
            'job_title' => 'required',
            'job_location' => 'required',
            'job_category' => 'required',
            'search' => 'required',
            'job_category_heading' => 'required',
            'job_category_status' => 'required',
            'why_choose_heading' => 'required',
            'why_choose_status' => 'required',
            'featured_job_heading' => 'required',
            'featured_job_status' => 'required',
            'testimonial_heading' => 'required',
            'testimonial_status' => 'required',
            'blog_heading' => 'required',
            'blog_status' => 'required',
        ]);

        if( $req->hasFile( 'background' ) )
        {
            $req->validate([
                'background' => 'image|mimes:jpg,jpeg,png',
            ]);

            unlink( public_path( 'uploads/' . $home_page_data->background ) );

             $ext = $req->file('background')->extension();
             $final_name = 'banner_home' . '.' . $ext;

             $req->file('background')->move( public_path('uploads/'), $final_name );

             $home_page_data->background = $final_name;
        }

        if( $req->hasFile( 'why_choose_background' ) )
        {
            $req->validate([
                'why_choose_background' => 'image|mimes:jpg,jpeg,png',
            ]);

            unlink( public_path( 'uploads/' . $home_page_data->why_choose_background ) );

             $ext = $req->file('why_choose_background')->extension();
             $final_name = 'why_choose_home_background' . '.' . $ext;

             $req->file('why_choose_background')->move( public_path('uploads/'), $final_name );

             $home_page_data->why_choose_background = $final_name;
        }

        if( $req->hasFile( 'testimonial_background' ) )
        {
            $req->validate([
                'testimonial_background' => 'image|mimes:jpg,jpeg,png',
            ]);

            unlink( public_path( 'uploads/' . $home_page_data->testimonial_background ) );

             $ext = $req->file('testimonial_background')->extension();
             $final_name = 'testimonial_home_background' . '.' . $ext;

             $req->file('testimonial_background')->move( public_path('uploads/'), $final_name );

             $home_page_data->testimonial_background = $final_name;
        }

        $home_page_data->heading = $req->heading;
        $home_page_data->text = $req->text;
        $home_page_data->job_title = $req->job_title;
        $home_page_data->job_location = $req->job_location;
        $home_page_data->job_category = $req->job_category;
        $home_page_data->search = $req->search;
        
        $home_page_data->job_category_heading = $req->job_category_heading;
        $home_page_data->job_category_subheading = $req->job_category_subheading;
        $home_page_data->job_category_status = $req->job_category_status;

        $home_page_data->why_choose_heading = $req->why_choose_heading;
        $home_page_data->why_choose_subheading = $req->why_choose_subheading;
        $home_page_data->why_choose_status = $req->why_choose_status;

        
        $home_page_data->featured_job_heading = $req->featured_job_heading;
        $home_page_data->featured_job_subheading = $req->featured_job_subheading;
        $home_page_data->featured_job_status = $req->featured_job_status;
        
        $home_page_data->testimonial_heading = $req->testimonial_heading;
        $home_page_data->testimonial_status = $req->testimonial_status;

        
        $home_page_data->blog_heading = $req->blog_heading;
        $home_page_data->blog_subheading = $req->blog_subheading;
        $home_page_data->blog_status = $req->blog_status;

        $home_page_data->title = $req->title;
        $home_page_data->meta_description = $req->meta_description;
        
        $home_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
