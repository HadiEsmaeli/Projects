<?php

namespace App\Http\Controllers\Admin\companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CompanyIndustry,
    Company,
};

class AdminCompanyIndustryController extends Controller
{
    public function index()
    {
        $company_industry = CompanyIndustry::get();
        return view('admin.companies.companyindustry.industry', compact( 'company_industry' ));
    }

    public function create()
    {
        return view('admin.companies.companyindustry.industry_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'industry_name' => 'required',
        ]);

        $obj = new CompanyIndustry();
        $obj->industry_name = $req->industry_name;
        $obj->save();

        return redirect()->route('admin_company_industry')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $company_industry = CompanyIndustry::where('id', $id)->first();

        return view('admin.companies.companyindustry.industry_edit', compact( 'company_industry' ));
    }

    public function update(Request $req, $id)
    {
        $obj = CompanyIndustry::where('id', $id)->first();

        $req->validate([
            'industry_name' => 'required',
        ]);
        
        $obj->industry_name = $req->industry_name;
        $obj->update();

        return redirect()->route('admin_company_industry')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $company = Company::where('company_industry_id', $id)->count();

        if( $company > 0 ) {
            return redirect()->route('admin_company_industry')->with('error', 'you cant delete this industry!');
        }

        CompanyIndustry::where('id', $id)->delete();
        return redirect()->route('admin_company_industry')->with('success', 'Data is deleted successfully!');
    }
}
