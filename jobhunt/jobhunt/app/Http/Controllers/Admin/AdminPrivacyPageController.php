<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PagePrivacyItem;

class AdminPrivacyPageController extends Controller
{
    public function index()
    {
        $page_privacy_data = PagePrivacyItem::where('id', 1)->first();

        return view('admin.page_privacy', compact( 'page_privacy_data' ));
    }

    public function update(Request $req)
    {
        $privacy_page_data = PagePrivacyItem::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

        $privacy_page_data->heading = $req->heading;
        $privacy_page_data->content = $req->content;
        $privacy_page_data->title = $req->title;
        $privacy_page_data->meta_description = $req->meta_description;

        $privacy_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
