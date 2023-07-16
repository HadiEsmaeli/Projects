<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index()
    {
        $page_title = "Menu List";
        $menues = Menu::all();

        return view('menu.index', compact('page_title', 'menues'));
    }
    
    public function create()
    {
        $page_title = "Menu Create";
        $categories = Category::where('type', 0)->get();

        return view('menu.create', compact('page_title', 'categories'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'required|mimes:jpg,jpeg,png',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $image = $request->file('thumbnail');
        $path = 'uploads/menu/';

        Menu::create([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => uploadImage($image, $path),
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('menu.index')->with('toast_success', 'Menu Added Successfully.');
    }
    
    public function show(Menu $menu)
    {
        //
    }
    
    public function edit(Menu $menu)
    {
        $page_title = "Menu Edit";
        $categories = Category::where('type', 0)->get();

        return view('menu.edit', compact('page_title', 'categories', 'menu'));
    }
    
    public function update(Request $request, Menu $menu)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'thumbnail' => 'mimes:jpg,jpeg,png',
            'description' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        if ($request->hasFile('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/menu/';
            $old_path = $menu->thumbnail == '' ? '' : public_path($menu->thumbnail);
        }

        $menu->update([
            'category_id' => $request->category_id,
            'title' => $request->title,
            'thumbnail' => $request->hasFile('thumbnail') ? uploadImage($image, $path, $old_path):$menu->thumbnail,
            'description' => $request->description,
            'price' => $request->price,
            'status' => $request->status,
        ]);

        return redirect()->route('menu.index')->with('toast_success', 'Menu Updated Successfully.');
    }
    
    public function destroy(Menu $menu)
    {
        if (file_exists(public_path($menu->thumbnail))) {
            unlink(public_path($menu->thumbnail));
        }
        $menu->delete();
        return back()->with('toast_success', 'Menu Deleted Successfully.');
    }
}
