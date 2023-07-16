<?php

namespace App\Http\Controllers\Admin\companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CompanyLocation,
    Company,
};

class AdminCompanyLocationController extends Controller
{
    public function index()
    {
        $company_location = CompanyLocation::get();
        return view('admin.companies.companylocation.location', compact( 'company_location' ));
    }

    public function create()
    {
        return view('admin.companies.companylocation.location_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'location' => 'required',
        ]);

        $obj = new CompanyLocation();
        $obj->location = $req->location;
        $obj->save();

        return redirect()->route('admin_company_location')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $company_location = CompanyLocation::where('id', $id)->first();

        return view('admin.companies.companylocation.location_edit', compact( 'company_location' ));
    }

    public function update(Request $req, $id)
    {
        $obj = CompanyLocation::where('id', $id)->first();

        $req->validate([
            'location' => 'required',
        ]);
        
        $obj->location = $req->location;
        $obj->update();

        return redirect()->route('admin_company_location')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $company = Company::where('company_location_id', $id)->count();

        if( $company > 0 ) {
            return redirect()->route('admin_company_location')->with('error', 'you cant delete this location!');
        }

        CompanyLocation::where('id', $id)->delete();
        return redirect()->route('admin_company_location')->with('success', 'Data is deleted successfully!');
    }
}
