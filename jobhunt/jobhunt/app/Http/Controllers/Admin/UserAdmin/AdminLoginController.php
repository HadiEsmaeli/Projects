<?php

namespace App\Http\Controllers\Admin\UserAdmin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\Websitemail;
use Hash;
use Auth;

class AdminLoginController extends Controller
{
    public function index()
    {
        if( Auth::guard('admin')->check() )
            return redirect()->route('admin_home');

        return view('admin.useradmin.login');
    }
    
    public function forget_password()
    {
        return view('admin.useradmin.forget_password');
    }

    public function forget_password_submit(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'newpassword' => 'required|max:100',
            'retype_password' => 'required|same:newpassword|max:100'
        ]);

        $email = $req->email;
        $NewPassword = $req->newpassword;

        $AdminMail = Admin::where('email', $email)->first();

        if( !$AdminMail )
        {
            return redirect()->back()->with('error', 'Something wrong!');
        }

        $AdminMail->password = Hash::make( $NewPassword );
        $AdminMail->update();

        return redirect()->route('admin_login')->with('success', 'successfully change!');
    }

    public function login_submit(Request $req)
    {
        $req->validate([
            'email' => 'required|email',
            'password' => 'required|max:100'
        ]);

        $credential = [
            'email' => $req->email,
            'password' => $req->password
        ];

        if( Auth::guard('admin')->attempt( $credential ) )
            return redirect()->route( 'admin_home' );

        return redirect()->route( 'admin_login' )->with('error', 'Information is not correct!');
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect()->route( 'admin_login' );
    }
}
