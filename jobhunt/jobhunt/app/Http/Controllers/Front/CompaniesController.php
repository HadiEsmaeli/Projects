<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CompanyLocation,
    CompanyIndustry,
    Advertisment,
    CompanyFound,
    CompanySize,
    CompanyPhoto,
    CompanyVideo,
    Company,
    Order,
    Job,
};
use Auth;
use App\Mail\WebSiteMail;

class CompaniesController extends Controller
{
    public function index(Request $req)
    {
        $company = Company::withCount('rCompany')->orderBy('r_company_count', 'desc');
        $location = CompanyLocation::get();
        $industry = CompanyIndustry::get();
        $found = CompanyFound::get();
        $ad = Advertisment::first();
        $size = CompanySize::get();

        $cols['company_name'] = $req->company_name;
        $kv = [
            'company_location_id',
            'company_industry_id',
            'company_size_id',
            'founded_on',
        ];

        foreach ($kv as $item)
            $cols[$item] = $req->$item;

        if( $cols['company_name'] != null )
            $company->where('company_name', 'LIKE', '%'.$cols['company_name'].'%');

        foreach ($kv as $item)
            if( $cols[$item] != null )
                $company->where($item, $cols[$item]);

        $company = $company->paginate(9);

        return view('front.companies.companies', compact(
            'location',
            'industry',
            'company',
            'found',
            'size',
            'cols',
            'ad',
        ));
    }

    public function detail($id)
    {
        $order = Order::where('company_id', $id)->where('currently_active', 1)->first();
        if( date('Y-m-d') > $order->expire_date )
            return redirect()->route('company_make_payment')->with('error', 'you must update your package!');

        $company = Company::withCount('rCompany')->where('id', $id)->first();

        $related_jobs = Job::where('company_id', $company->id)->get();

        $photos = CompanyPhoto::where('company_id', $company->id)->get();
        $videos = CompanyVideo::where('company_id', $company->id)->get();

        return view('front.companies.detail_company', 
            compact( 
                'company',
                'photos',
                'videos',
                'related_jobs',
            ));
    }

    public function contact_mail(Request $req, $id)
    {
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $email = Job::where('company_id', $id)->first();

        $title = 'contact from message';
        $body = 'Visitor Information: <br>';
        $body .= 'Name: ' . $req->name . '<br>';
        $body .= 'E-mail: ' . $req->email . '<br>';
        $body .= 'Phone: ' . $req->phone . '<br>';
        $body .= 'Message: ' . $req->message;

        $mailDate = [
            'title' => $title, 
            'body' => $body
        ];

        \Mail::to( $email->rCompany->email )->send( new WebSiteMail( $mailDate ) );

        return redirect()->back()->with('success', 'E-mail is send successfully.');
    }
}
