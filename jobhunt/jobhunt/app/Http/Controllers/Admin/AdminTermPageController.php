<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTermItem;

class AdminTermPageController extends Controller
{
    public function index()
    {
        $page_term_data = PageTermItem::where('id', 1)->first();

        return view('admin.page_term', compact( 'page_term_data' ));
    }

    public function update(Request $req)
    {
        $faq_page_data = PageTermItem::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
            'content' => 'required',
        ]);

        $faq_page_data->heading = $req->heading;
        $faq_page_data->content = $req->content;
        $faq_page_data->title = $req->title;
        $faq_page_data->meta_description = $req->meta_description;

        $faq_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
