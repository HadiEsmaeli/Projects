<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageBlogItem;

class AdminBlogPageController extends Controller
{
    public function index()
    {
        $page_blog_data = PageBlogItem::where('id', 1)->first();

        return view('admin.blog.page_blog', compact( 'page_blog_data' ));
    }

    public function update(Request $req)
    {
        $blog_page_data = PageBlogItem::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
        ]);

        $blog_page_data->heading = $req->heading;
        $blog_page_data->title = $req->title;
        $blog_page_data->meta_description = $req->meta_description;

        $blog_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
