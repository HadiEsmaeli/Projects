<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\WebSiteMail;
use App\Models\ {
    CandidateApplication,
    CandidateBookmark,
    JobExperience,
    Advertisment,
    JobLocation,
    JobCategory,
    JobSalary,
    JobType,
    Job,
};
use Auth;

class JobsController extends Controller
{
    public function listingjob(Request $req)
    {
        $job_categories = JobCategory::get();
        $job_locations = JobLocation::get();
        $experience = JobExperience::get();
        $SalaryRange = JobSalary::get();
        $ad = Advertisment::first();
        $job_types = JobType::get();

        $cols['job_experience_id'] = $req->experience;
        $cols['job_salary_range_id'] = $req->salary;
        $cols['job_location_id'] = $req->location;
        $cols['job_category_id'] = $req->category;
        $cols['job_gender_id'] = $req->gender;
        $cols['job_type_id'] = $req->type;
        $cols['job_title'] = $req->title;

        $jobs = Job::orderBy('id', 'desc');

        if( $cols['job_title'] != null )
            $jobs->where('title', 'LIKE', '%'.$cols['job_title'].'%');

        $kv = [
            'job_location_id',
            'job_category_id',
            'job_type_id',
            'job_experience_id',
            'job_salary_range_id',
            'job_gender_id',
        ];
        foreach ($kv as $item) {
            if( $cols[$item] != null ){
                $jobs->where($item, $cols[$item]);
            }
        }

        $jobs = $jobs->paginate(9);
        
        return view('front.findjob.listingjobs', 
            compact(
                'job_categories',
                'job_locations',
                'SalaryRange',
                'experience',
                'job_types',
                'jobs',
                'cols',
                'ad',
            ));
    }

    public function detail_job($id)
    {
        $job = Job::where('id', $id)->first();

        if( !$job )
            return redirect()->route('job_listing');

        $related_jobs = Job::where('job_category_id', $job->job_category_id)->where('id', '!=', $job->id)->get();
        $apply = 0;

        if( !Auth::guard('company')->check() ) {

            if( Auth::guard('candidate')->check() ) {
                $candidate_id = Auth::guard('candidate')->user()->id;

                $apply = CandidateApplication::where('job_id', $id)->where('candidate_id', $candidate_id)->count();
            }
        }

        return view('front.findjob.detail_job', compact( 'job', 'related_jobs', 'apply' ));
    }

    public function enquery(Request $req, $id)
    {
        $req->validate([
            'job_title' => 'required',
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        $email = Job::where('company_id', $id)->first();        

        $title = 'Enquery from job: ' . $req->job_title;
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
