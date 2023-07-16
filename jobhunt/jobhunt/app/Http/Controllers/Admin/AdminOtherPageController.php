<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;

class AdminOtherPageController extends Controller
{
    public function index()
    {
        $page_other_data = PageOtherItem::where('id', 1)->first();

        return view('admin.page_other', compact( 'page_other_data' ));
    }

    public function update(Request $req)
    {
        $other_page_data = PageOtherItem::where('id', 1)->first();

        $req->validate([
            'login_page_heading' => 'required',
            'signup_page_heading' => 'required',
            'forget_password_page_heading' => 'required',
        ]);

        $other_page_data->login_page_heading = $req->login_page_heading;
        $other_page_data->login_page_title = $req->login_page_title;
        $other_page_data->login_page_meta_description = $req->login_page_meta_description;
        
        $other_page_data->signup_page_heading = $req->signup_page_heading;
        $other_page_data->signup_page_title = $req->signup_page_title;
        $other_page_data->signup_page_meta_description = $req->signup_page_meta_description;
        
        $other_page_data->forget_password_heading = $req->forget_password_page_heading;
        $other_page_data->forget_password_title = $req->forget_password_page_title;
        $other_page_data->forget_password_meta_description = $req->forget_password_page_meta_description;
        
        $other_page_data->job_listing_page_heading = $req->job_listing_page_heading;
        $other_page_data->job_listing_page_title = $req->job_listing_page_title;
        $other_page_data->job_listing_page_meta_description = $req->job_listing_page_meta_description;
        
        $other_page_data->company_listing_page_heading = $req->company_listing_page_heading;
        $other_page_data->company_listing_page_title = $req->company_listing_page_title;
        $other_page_data->company_listing_page_meta_description = $req->company_listing_page_meta_description;

        $other_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
