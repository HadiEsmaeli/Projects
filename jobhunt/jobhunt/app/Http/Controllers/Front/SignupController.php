<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebSiteMail;
use App\Models\ {
    PageOtherItem,
    Company,
    Candidate,
};
use Hash;
use Auth;
use Mail;

class SignupController extends Controller
{
    public function signup(Request $req)
    {
        if( Auth::guard('candidate')->check() )
            return redirect()->route('candidate_dashboard');
        if( Auth::guard('company')->check() )
            return redirect()->route('company_dashboard');

        $other_page_data = PageOtherItem::where('id', 1)->first();
        
        return view('front.signup', compact( 'other_page_data' ));
    }

    /* Company */
    public function signup_company(Request $req)
    {
        $req->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $token = hash( 'sha256', time() );

        $obj = new Company();
        $obj->company_name = $req->company_name;
        $obj->person_name = $req->person_name;
        $obj->username = $req->username;
        $obj->email = $req->email;
        $obj->password = Hash::make( $req->password );
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verify_link = url('company/signup-verify/' . $token . '/' . $req->email);
        $body = "Please click on the following link: <br>";
        $body .= "<a href=\"".$verify_link."\">Click to active Account</a>";
        
        $mailData = [
            'title' => 'Company Signup Verification',
            'body' => $body
        ];
 
        Mail::to($req->email)->send(new WebSiteMail($mailData));

        return redirect()->route('login')->with('success', 'email is send to you email address, you must have to check thet and click on the confirmation link to validate your signup');
    }

    public function company_signup_verify($token, $email)
    {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if( !$company_data )
            return redirect()->route('login');
        
        $company_data->token = '';
        $company_data->status = 1;
        $company_data->update();

        return redirect()->route('login')->with('success', 'Your email is verified successfully. you can now login to the system as company.');
    }

    /* Candidate */
    public function signup_candidate(Request $req)
    {
        $req->validate([
            'candidate_name' => 'required',
            'username' => 'required|unique:candidates',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'retype_password' => 'required|same:password',
        ]);

        $token = hash( 'sha256', time() );

        $obj = new Candidate();
        $obj->name = $req->candidate_name;
        $obj->username = $req->username;
        $obj->email = $req->email;
        $obj->password = Hash::make( $req->password );
        $obj->token = $token;
        $obj->status = 0;
        $obj->save();

        $verify_link = url('candidate/signup-verify/' . $token . '/' . $req->email);
        $body = "Please click on the following link: <br>";
        $body .= "<a href=\"".$verify_link."\">Click to active Account</a>";
        
        $mailData = [
            'title' => 'Candidate Signup Verification',
            'body' => $body
        ];
 
        Mail::to($req->email)->send(new WebSiteMail($mailData));

        return redirect()->route('login')->with('success', 'email is send to you email address, you must have to check thet and click on the confirmation link to validate your signup');
    }

    public function candidate_signup_verify($token, $email)
    {
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        if( !$candidate_data )
            return redirect()->route('login');
        
        $candidate_data->token = '';
        $candidate_data->status = 1;
        $candidate_data->update();

        return redirect()->route('login')->with('success', 'Your email is verified successfully. you can now login to the system as company.');
    }
}
