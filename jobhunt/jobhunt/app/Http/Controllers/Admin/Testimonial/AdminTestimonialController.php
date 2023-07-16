<?php

namespace App\Http\Controllers\Admin\Testimonial;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Testimonials;

class AdminTestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonials::get();
        return view('admin.testimonials.testimonial', compact( 'testimonial' ));
    }

    public function create()
    {
        return view('admin.testimonials.testimonial_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'photo' => 'image|mimes:jpg,jpeg,png',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        $obj = new Testimonials();

        $ext = $req->file('photo')->extension();
        $final_name = 'testimonial_' . time() . '.' . $ext;

        $req->file('photo')->move( public_path('uploads/testimonials/'), $final_name );

        $obj->photo = $final_name;
        $obj->name = $req->name;
        $obj->designation = $req->designation;
        $obj->comment = $req->comment;
        $obj->save();

        return redirect()->route('admin_testimonial')->with('success', 'Data save successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonials::where('id', $id)->first();
        return view('admin.testimonials.testimonial_edit', compact( 'testimonial' ));
    }

    public function update(Request $req, $id)
    {
        $obj = Testimonials::where('id', $id)->first();

        $req->validate([
            'photo' => 'required',
            'name' => 'required',
            'designation' => 'required',
            'comment' => 'required',
        ]);

        $ext = $req->file('photo')->extension();
        $final_name = 'testimonial_' . time() . '.' . $ext;

        $req->file('photo')->move( public_path('uploads/testimonials/'), $final_name );
        
        $obj->photo = $final_name;
        $obj->name = $req->name;
        $obj->designation = $req->designation;
        $obj->comment = $req->comment;
        $obj->update();

        return redirect()->route('admin_testimonial')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $item = Testimonials::where('id', $id);
        $row = $item->first();
        $photo = $row->photo;

        unlink( public_path( 'uploads/testimonials/' . $photo ) );
        $item->delete();

        return redirect()->route('admin_testimonial')->with('success', 'Data is deleted successfully!');
    }
}
