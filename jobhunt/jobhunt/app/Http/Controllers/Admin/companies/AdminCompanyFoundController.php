<?php

namespace App\Http\Controllers\Admin\companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CompanyFound,
    Company,
};

class AdminCompanyFoundController extends Controller
{
    public function index()
    {
        $company_found = CompanyFound::get();
        return view('admin.companies.companyfound.found', compact( 'company_found' ));
    }

    public function create()
    {
        return view('admin.companies.companyfound.found_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'found' => 'required',
        ]);

        $obj = new CompanyFound();
        $obj->found = $req->found;
        $obj->save();

        return redirect()->route('admin_company_found')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $company_found = CompanyFound::where('id', $id)->first();

        return view('admin.companies.companyfound.found_edit', compact( 'company_found' ));
    }

    public function update(Request $req, $id)
    {
        $obj = CompanyFound::where('id', $id)->first();

        $req->validate([
            'found' => 'required',
        ]);
        
        $obj->found = $req->found;
        $obj->update();

        return redirect()->route('admin_company_found')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $company = Company::where('company_founded_on', $id)->count();

        if( $company > 0 ) {
            return redirect()->route('admin_company_found')->with('error', 'you cant delete this found!');
        }

        CompanyFound::where('id', $id)->delete();
        return redirect()->route('admin_company_found')->with('success', 'Data is deleted successfully!');
    }
}
