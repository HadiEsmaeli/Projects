<?php

namespace App\Http\Controllers\Admin\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Auth;
use Hash;

class AdminProfileController extends Controller
{
    public function index()
    {
        return view('admin.useradmin.profile');
    }
    
    public function profile_submit(Request $req)
    {
        $data = Admin::where( 'email', Auth::guard('admin')->user()->email )->first();

        $req->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        if( $req->new_password != '' )
        {
            $req->validate([
                'new_password' => 'required',
                'retype_password' => 'required|same:new_password',
            ]);
            $data->password = Hash::make( $req->new_password );
        }

        if( $req->hasFile( 'photo' ) )
        {
            $req->validate([
                'photo' => 'image|mimes:jpg,jpeg,png',
            ]);

            if( $data->photo != '' )
                unlink( public_path( 'uploads/admin/' . $data->photo ) );

             $ext = $req->file('photo')->extension();
             $final_name = 'admin' . '.' . $ext;

             $req->file('photo')->move( public_path('uploads/admin/'), $final_name );

             $data->photo = $final_name;
        }

        $data->name = $req->name;
        $data->email = $req->email;
        $data->update();

        return redirect()->back()->with('success', 'Profile information is insert successfully!');
    }
}
