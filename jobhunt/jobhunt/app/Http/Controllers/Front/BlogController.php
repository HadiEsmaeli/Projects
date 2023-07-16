<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PageBlogItem;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Post::orderBy('id', 'desc')->paginate(2);
        $page_blog_data = PageBlogItem::where('id', 1)->first();

        return view('front.blog', compact( 'blog', 'page_blog_data' ));
    }
}
