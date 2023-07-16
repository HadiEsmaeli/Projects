<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Faq;

class AdminFaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::get();
        return view('admin.faq.faq', compact( 'faqs' ));
    }

    public function create()
    {
        return view('admin.faq.faq_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $obj = new Faq();        
        $obj->question = $req->question;
        $obj->answer = $req->answer;
        $obj->save();

        return redirect()->route('admin_faq')->with('success', 'Data save successfully!');
    }

    public function edit($id)
    {
        $faq = Faq::where('id', $id)->first();
        return view('admin.faq.faq_edit', compact( 'faq' ));
    }

    public function update(Request $req, $id)
    {
        $obj = Faq::where('id', $id)->first();

        $req->validate([
            'question' => 'required',
            'answer' => 'required',
        ]);

        $obj->question = $req->question;
        $obj->answer = $req->answer;
        $obj->update();

        return redirect()->route('admin_faq')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $item = Faq::where('id', $id)->first();
        $item->delete();

        return redirect()->route('admin_faq')->with('success', 'Data is deleted successfully!');
    }
}
