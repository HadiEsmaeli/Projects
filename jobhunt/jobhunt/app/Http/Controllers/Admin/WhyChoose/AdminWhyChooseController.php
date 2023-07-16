<?php

namespace App\Http\Controllers\Admin\WhyChoose;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WhyChooseItem;

class AdminWhyChooseController extends Controller
{
    public function index()
    {
        $why_choose_items = WhyChooseItem::get();

        return view('admin.whychoose.why_choose_item', compact( 'why_choose_items' ));
    }

    public function create()
    {
        return view('admin.whychoose.why_choose_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'icon' => 'required',
            'heading' => 'required',
            'text' => 'required',
        ]);

        $obj = new WhyChooseItem();
        $obj->icon = $req->icon;
        $obj->heading = $req->heading;
        $obj->text = $req->text;
        $obj->save();

        return redirect()->route('admin_why_choose')->with('success', 'Data save successfully!');
    }

    public function edit($id)
    {
        $why_choose = WhyChooseItem::where('id', $id)->first();

        return view('admin.whychoose.why_choose_edit', compact( 'why_choose' ));
    }

    public function update(Request $req, $id)
    {
        $obj = WhyChooseItem::where('id', $id)->first();

        $req->validate([
            'heading' => 'required',
            'text' => 'required',
            'icon' => 'required',
        ]);
        
        $obj->icon = $req->icon;
        $obj->heading = $req->heading;
        $obj->text = $req->text;
        $obj->update();

        return redirect()->route('admin_why_choose')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        WhyChooseItem::where('id', $id)->delete();

        return redirect()->route('admin_why_choose')->with('success', 'Data is deleted successfully!');
    }
}
