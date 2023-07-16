<?php

namespace App\Http\Controllers\Admin\companies;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    CompanySize,
    Company,
};

class AdminCompanySizeController extends Controller
{
    public function index()
    {
        $company_size = CompanySize::get();
        return view('admin.companies.companysize.size', compact( 'company_size' ));
    }

    public function create()
    {
        return view('admin.companies.companysize.size_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'size' => 'required',
        ]);

        $obj = new CompanySize();
        $obj->size = $req->size;
        $obj->save();

        return redirect()->route('admin_company_size')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $company_size = CompanySize::where('id', $id)->first();

        return view('admin.companies.companysize.size_edit', compact( 'company_size' ));
    }

    public function update(Request $req, $id)
    {
        $obj = CompanySize::where('id', $id)->first();

        $req->validate([
            'size' => 'required',
        ]);
        
        $obj->size = $req->size;
        $obj->update();

        return redirect()->route('admin_company_size')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $company = Company::where('company_size_id', $id)->count();

        if( $company > 0 ) {
            return redirect()->route('admin_company_size')->with('error', 'you cant delete this size!');
        }

        CompanySize::where('id', $id)->delete();
        return redirect()->route('admin_company_size')->with('success', 'Data is deleted successfully!');
    }
}
