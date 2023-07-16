<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function index()
    {
        $students = new Student();
        $get = $students::get();

        return View('home', compact('get'));
    }

    public function store(Request $req)
    {

        $req->validate([
            'photo' => 'required|image|mimes:jpeg,jpg|max:2048',
            'name' => 'required',
            'email' => 'required|email'
        ]);

        $ext = $req->file('photo')->extension();
        $final_name = date('YdmHis').'.'.$ext;

        $req->file('photo')->move(public_path('uploads/'), $final_name);

        $name = $req->name;
        $email = $req->email;

        $stdnt = new Student();

        $stdnt->photo = $final_name;
        $stdnt->name = $name;
        $stdnt->email = $email;
        $stdnt->save();

        return redirect()->route('home')->with('success', 'we have get your infos.');
    }

    public function edit($id, Request $req)
    {
        $stdnt = Student::where('id', $id)->first();
        return View('edit', compact('stdnt'));
    }

    public function update($id, Request $req)
    {

        $stdnt = Student::where('id', $id)->first();

        $req->validate([
            'name' => 'required',
            'email' => 'required|email'
        ]);

        if( $req->hasFile('photo') )
        {
            $req->validate([
                'photo' => 'image|mimes:jpeg,jpg|max:2048'
            ]);

            unlink( public_path('uploads/' . $stdnt->photo) );

            $ext = $req->file('photo')->extension();
            $final_name = date('YdmHis').'.'.$ext;
    
            $req->file('photo')->move(public_path('uploads/'), $final_name);
            $stdnt->photo = $final_name;
        }

        $stdnt->name = $req->name;
        $stdnt->email = $req->email;
        $stdnt->update();

        return redirect()->route('home')->with('success', 'Data is update successfully.');
    }

    public function delete($id, Request $req)
    {
        $req->validate([
            'id' => $id
        ]);
        $stdnt = Student::where('id', $id)->first();
        unlink( public_path( 'uploads/' . $stdnt->photo ) );
        $stdnt->delete();

        return redirect()->back()->with('success', $stdnt->name . ' Deleted successfully.');
    }

}
