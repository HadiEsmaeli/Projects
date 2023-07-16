<?php

namespace App\Http\Controllers\Admin\Subscriber;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Subscriber;
use App\Mail\WebsiteMail;

class AdminSubscriberController extends Controller
{
    public function all_subscribers()
    {
        $subscribers = Subscriber::where('status',1)->get();
        return view('admin.subscribers.all_subscribers', compact('subscribers'));
    }

    public function send_email()
    {
        return view('admin.subscribers.subscribers_send_email');
    }

    public function send_email_submit(Request $request) 
    {
        $request->validate([
            'subject' => 'required',
            'comment' => 'required'
        ]);

        $subject = $request->subject;
        $message = $request->comment;

        $mailData = [
            'title' => $subject,
            'body' => $message,
        ];
        
        $all_subs = Subscriber::where('status',1)->get();
        foreach($all_subs as $item)
        {
            \Mail::to($item->email)->send(new Websitemail($mailData));
        }        

        return redirect()->back()->with('success','Email is sent to all subscribers');
    }

    public function delete($id)
    {
        Subscriber::where('id',$id)->delete();
        return redirect()->back()->with('success', 'Data is deleted successfully.');
    }
}
