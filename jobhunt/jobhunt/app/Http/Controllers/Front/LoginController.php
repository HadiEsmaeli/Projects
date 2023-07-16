<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use App\Models\Candidate;
use Auth;
use Hash;

class LoginController extends Controller
{
    public function login(Request $req)
    {
        if( Auth::guard('candidate')->check() )
            return redirect()->route('candidate_dashboard');
        if( Auth::guard('company')->check() )
            return redirect()->route('company_dashboard');
        
        $other_page_data = PageOtherItem::where('id', 1)->first();
        
        return view('front.login', compact( 'other_page_data' ));
    }

    public function login_company(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = [
            'username' => $req->username,
            'password' => $req->password,
            'status' => 1,
        ];

        $data = Company::where('username', $req->username)->where('status', 1)->first();
        if( !$data )
            return redirect()->route('login');

        if( Auth::guard('company')->attempt( $credential ) )
            return redirect()->route('company_dashboard');
        
        return redirect()->route('login')->with('error', 'Information is not correct!');
    }

    /* Candidate */
    public function login_candidate(Request $req)
    {
        $req->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $credential = [
            'username' => $req->username,
            'password' => $req->password,
            'status' => 1,
        ];

        $data = Candidate::where('username', $req->username)->where('status', 1)->first();
        if( !$data )
            return redirect()->route('login');

        if( Auth::guard('candidate')->attempt( $credential ) )
            return redirect()->route('candidate_dashboard');
        
        return redirect()->route('login')->with('error', 'Information is not correct!');
    }
}
