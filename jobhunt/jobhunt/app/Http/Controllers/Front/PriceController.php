<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Package;
use App\Models\PagePricingItem;

class PriceController extends Controller
{
    public function index()
    {
        $packages = Package::get();
        $page_items = PagePricingItem::where('id', 1)->first();
               
        return view('front.pricing', compact( 'packages', 'page_items' ));
    }
}
