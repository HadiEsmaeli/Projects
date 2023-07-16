<?php

namespace App\Http\Controllers\Admin\Post;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Post;

class AdminPostController extends Controller
{
    public function index()
    {
        $post = Post::get();
        return view('admin.post.post', compact( 'post' ));
    }
    
    public function create()
    {
        return view('admin.post.post_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'heading' => 'required',
            'slug' => 'required|alpha_dash|unique:posts',
            'short_description' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'title' => 'required',
        ]);

        $obj = new Post();

        $ext = $req->file('photo')->extension();
        $final_name = 'post_' . time() . '.' . $ext;

        $req->file('photo')->move( public_path('uploads/posts/'), $final_name );

        $obj->photo = $final_name;
        $obj->heading = $req->heading;
        $obj->slug = $req->slug;
        $obj->short_description = $req->short_description;
        $obj->description = $req->description;
        $obj->total_view = 0;
        $obj->meta_description = $req->meta_description;
        $obj->title = $req->title;
        $obj->save();

        return redirect()->route('admin_post')->with('success', 'Data save successfully!');
    }
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('admin.post.post_edit', compact( 'post' ));
    }

    public function update(Request $req, $id)
    {
        $obj = Post::where('id', $id)->first();

        $req->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png',
            'heading' => 'required',
            'slug' => [ 'required', 'alpha_dash', Rule::unique("posts")->ignore($id) ],
            'short_description' => 'required',
            'description' => 'required',
            'meta_description' => 'required',
            'title' => 'required',
        ]);

        $ext = $req->file('photo')->extension();
        $final_name = 'post_' . time() . '.' . $ext;

        $req->file('photo')->move( public_path('uploads/posts/'), $final_name );

        unlink( public_path( 'uploads/posts/' . $obj->photo ) );
        
        $obj->photo = $final_name;
        $obj->heading = $req->heading;
        $obj->slug = $req->slug;
        $obj->short_description = $req->short_description;
        $obj->description = $req->description;
        $obj->meta_description = $req->meta_description;
        $obj->title = $req->title;
        $obj->update();

        return redirect()->route('admin_post')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $item = Post::where('id', $id);
        $row = $item->first();
        $photo = $row->photo;

        unlink( public_path( 'uploads/posts/' . $photo ) );
        $item->delete();

        return redirect()->route('admin_post')->with('success', 'Data is deleted successfully!');
    }
}
