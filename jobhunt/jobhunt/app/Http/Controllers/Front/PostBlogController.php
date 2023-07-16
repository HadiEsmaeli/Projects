<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class PostBlogController extends Controller
{
    public function post($slug)
    {
        $post = Post::where('slug', $slug)->first();
        $post->total_view += 1;
        $post->update();

        return view( 'front.post', compact( 'post' ) );
    }
}
