<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageTermItem;

class TermController extends Controller
{
    public function index()
    {
        $page_term_item = PageTermItem::where('id', 1)->first();

        return view('front.terms', compact( 'page_term_item' ));
    }
}
