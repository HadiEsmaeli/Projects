<?php

namespace App\Http\Controllers\Admin\Salary;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ {
    JobSalary,
    Job,
};

class AdminSalaryController extends Controller
{
    public function index()
    {
        $salary = JobSalary::get();
        return view('admin.salary.salary', compact( 'salary' ));
    }

    public function create()
    {
        return view('admin.salary.salary_create');
    }

    public function store(Request $req)
    {
        $req->validate([
            'range' => 'required',
        ]);

        $obj = new JobSalary();
        $obj->range = $req->range;
        $obj->save();

        return redirect()->route('admin_salary')->with('success', 'Data store successfully!');
    }

    public function edit($id)
    {
        $salary = JobSalary::where('id', $id)->first();

        return view('admin.salary.salary_edit', compact( 'salary' ));
    }
    public function update(Request $req, $id)
    {
        $obj = JobSalary::where('id', $id)->first();

        $req->validate([
            'range' => 'required',
        ]);
        
        $obj->range = $req->range;
        $obj->update();

        return redirect()->route('admin_salary')->with('success', 'Data updated successfully!');
    }

    public function delete($id)
    {
        $job = Job::where('job_salary_range_id', $id)->count();

        if( $job > 0 ) {
            return redirect()->route('admin_salary')->with('error', 'you cant delete this salary!');
        }

        JobSalary::where('id', $id)->delete();
        return redirect()->route('admin_salary')->with('success', 'Data is deleted successfully!');
    }
}
