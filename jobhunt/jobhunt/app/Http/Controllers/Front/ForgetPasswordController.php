<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use App\Models\Candidate;
use App\Mail\WebSiteMail;
use Auth;
use Mail;
use Hash;

class ForgetPasswordController extends Controller
{
    public function forgetpassword_company()
    {
        if( Auth::guard('candidate')->check() )
            return redirect()->route('candidate_dashboard');
        if( Auth::guard('company')->check() )
            return redirect()->route('company_dashboard');

        $other_page_data = PageOtherItem::where('id', 1)->first();
            
        return view('company.forgetPassword_company', compact( 'other_page_data' ));
    }

    public function forgetpassword_company_submit(Request $req)
    {
        $req->validate([
            'email' => 'required|email'
        ]);

        $company_data = Company::where('email', $req->email)->first();
        if( !$company_data )
            return redirect()->back()->with('error', 'Email address not found!');

        $token = hash( 'sha256', time() );
        $company_data->token = $token;
        $company_data->update();

        $reset_link = url('company/reset-password/' . $token . '/' . $req->email);
        $body = "Please click on the following link: <br>";
        $body .= "<a href=\"".$reset_link."\">Click to here</a>";
        
        $mailData = [
            'title' => 'Reset password',
            'body' => $body
        ];
 
        Mail::to( $req->email )->send(new WebSiteMail($mailData));

        return redirect()->route('login')->with('success', 'Please check your email, for reset your password account');
   
    }

    public function resetpassword_company($token, $email)
    {
        $company_data = Company::where('token', $token)->where('email', $email)->first();
        if( !$company_data )
            return redirect()->route('login');

        return view('front.company.company_reset_password', compact( 'token', 'email' ));
    }

    public function resetpassword_company_submit(Request $req)
    {
        $req->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = $req->token;
        $email = $req->email;
        
        $company_data = Company::where('token', $token)->where('email', $email)->first();

        $company_data->password = Hash::make( $req->password );
        $company_data->token = '';
        $company_data->update();

        return redirect()->route('login')->with('success', 'your password reset, now try to login');
    }

    /* Candidate */

    public function forgetpassword_candidate()
    {
        $other_page_data = PageOtherItem::where('id', 1)->first();
            
        return view('candidate.forgetPassword_candidate', compact( 'other_page_data' ));
    }

    public function forgetpassword_candidate_submit(Request $req)
    {
        $req->validate([
            'email' => 'required|email'
        ]);

        $candidate_data = Candidate::where('email', $req->email)->first();
        if( !$candidate_data )
            return redirect()->back()->with('error', 'Email address not found!');

        $token = hash( 'sha256', time() );
        $candidate_data->token = $token;
        $candidate_data->update();

        $reset_link = url('candidate/reset-password/' . $token . '/' . $req->email);
        $body = "Please click on the following link: <br>";
        $body .= "<a href=\"".$reset_link."\">Click to here</a>";
        
        $mailData = [
            'title' => 'Reset password',
            'body' => $body
        ];
 
        Mail::to( $req->email )->send(new WebSiteMail($mailData));

        return redirect()->route('login')->with('success', 'Please check your email, for reset your password account');
   
    }

    public function resetpassword_candidate($token, $email)
    {
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();
        if( !$candidate_data )
            return redirect()->route('login');

        return view('candidate.candidate_reset_password', compact( 'token', 'email' ));
    }

    public function resetpassword_candidate_submit(Request $req)
    {
        $req->validate([
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $token = $req->token;
        $email = $req->email;
        
        $candidate_data = Candidate::where('token', $token)->where('email', $email)->first();

        $candidate_data->password = Hash::make( $req->password );
        $candidate_data->token = '';
        $candidate_data->update();

        return redirect()->route('login')->with('success', 'your password reset, now try to login');
    }
}
