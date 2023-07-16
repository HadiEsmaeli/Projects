<?php

namespace App\Http\Controllers\Admin\Faq;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageFaqItem;

class AdminFaqPageController extends Controller
{
    public function index()
    {
        $page_faq_data = PageFaqItem::where('id', 1)->first();

        return view('admin.faq.page_faq', compact( 'page_faq_data' ));
    }

    public function update(Request $req)
    {
        $faq_page_data = PageFaqItem::where('id', 1)->first();

        $req->validate([
            'heading' => 'required',
        ]);

        $faq_page_data->heading = $req->heading;
        $faq_page_data->title = $req->title;
        $faq_page_data->meta_description = $req->meta_description;

        $faq_page_data->update();

        return redirect()->back()->with('success', 'Data is updated successfully!');
    }
}
