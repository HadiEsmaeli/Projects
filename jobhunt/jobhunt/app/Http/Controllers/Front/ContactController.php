<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\WebSiteMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\PageContactItem;
use App\Models\Admin;

class ContactController extends Controller
{
    public function index()
    {
        $page_contact_data = PageContactItem::where('id', 1)->first();

        return view('front.contact', compact( 'page_contact_data' ));
    }

    public function store(Request $req)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'msg' => 'required',
        ]);

        $mail = Admin::where('id', 1)->first();

        $subject = 'Contact From Message';
        $message = 'Visitor Information: <br>';
        $message .= 'Name: ' . $req->name . '<br>';
        $message .= 'E-mail: ' . $req->email . '<br>';
        $message .= 'Message: ' . $req->msg;

        $mailData = [
            'title' => $subject,
            'body' => $message,
        ];

        \Mail::to($mail->email)->send(new WebSiteMail( $mailData ));

        return redirect()
        ->back()
        ->with('success', 'Email is send successfully! We will contact you soon.');
    }
}
