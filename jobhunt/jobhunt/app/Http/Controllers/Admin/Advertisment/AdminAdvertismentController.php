<?php

namespace App\Http\Controllers\Admin\Advertisment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Advertisment;

class AdminAdvertismentController extends Controller
{
    public function index()
    {
        $ad = Advertisment::where('id', 1)->first();

        return view('admin.ad.ad', compact( 'ad' ));
    }

    public function update(Request $req)
    {
        $obj = Advertisment::where('id', 1)->first();

        if( $req->hasFile('job_listing_ad') ) {

            unlink( public_path( 'uploads/job_ad/' . $obj->job_listing_ad ) );

            $ext = $req->file('job_listing_ad')->extension();
            $finalname = 'job_listing_ad' . '.' . $ext;

            $req->file('job_listing_ad')->move( public_path( 'uploads/job_ad' ), $finalname );

            $obj->job_listing_ad = $finalname;
        }

        if( $req->hasFile('company_listing_ad') ) {

            unlink( public_path( 'uploads/company/ad/' . $obj->company_listing_ad ) );

            $ext = $req->file('company_listing_ad')->extension();
            $finalname = 'company_listing_ad' . '.' . $ext;

            $req->file('company_listing_ad')->move( public_path( 'uploads/company/ad/' ), $finalname );

            $obj->company_listing_ad = $finalname;
        }
        
        $obj->job_listing_ad_status = $req->job_listing_ad_status;
        $obj->company_listing_ad_status = $req->company_listing_ad_status;
        $obj->job_listing_ad_url = $req->job_listing_ad_url;
        $obj->company_listing_ad_url = $req->company_listing_ad_url;

        $obj->update();

        return redirect()->back()->with('success', 'Data is update successfull.');
    }
}
