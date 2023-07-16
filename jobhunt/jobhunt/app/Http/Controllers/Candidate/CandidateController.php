<?php

namespace App\Http\Controllers\Candidate;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Mail\WebsiteMail;
use App\Models\ {
    CandidateApplication,
    CandidateExperience,
    CandidateEducation,
    CandidateBookmark,
    CandidateResume,
    CandidateAward,
    CandidateSkill,
    Candidate,
    Job,
};
use Auth;
use Hash;

class CandidateController extends Controller
{
    public function dashboard()
    {
        $total_applied_jobs = $total_rejected_jobs = $total_approved_jobs=0;

        $total_applied_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Applied')->count();

        $total_rejected_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Rejected')->count();

        $total_approved_jobs = CandidateApplication::where('candidate_id',Auth::guard('candidate')->user()->id)->where('status','Approved')->count();

        return view('candidate.dashboard', compact('total_applied_jobs','total_rejected_jobs','total_approved_jobs'));
    }

    public function logout()
    {
        Auth::guard('candidate')->logout();

        return redirect()->route('login');
    }

    public function edit_profile()
    {
        $candidate = Auth::guard('candidate')->user();
        
        return view('candidate.edit_profile', compact( 'candidate' ));
    }

    public function profile_update(Request $req)
    {
        $guard = Auth::guard('candidate')->user();
        $user = $guard->username;
        $id = $guard->id;
        
        $req->validate([
            'name' => 'required',
            'username' => [ 'required', Rule::unique('candidates')->ignore($id) ],
            'email' => [ 'required', 'email', Rule::unique('candidates')->ignore($id) ],
        ]);

        $candidate = Candidate::where('username', $user)->first();
        
        if( $req->hasFile( 'photo' ) ){
            $req->validate([
                'photo' => 'image|mimes:jpg,jpeg,png'
            ]);

            if( $candidate->photo != '' )
                unlink( public_path( 'uploads/candidate/profile_photos/' . $candidate->photo ) );

            $ext = $req->file('photo')->extension();
            $final_name = 'candidate_profile_photo_' . time() . '.' . $ext;
            $req->file('photo')->move( public_path( 'uploads/candidate/profile_photos/' ), $final_name );
            
            $candidate->photo = $final_name;
        }

        $candidate->name = $req->name;
        $candidate->designation = $req->designation;
        $candidate->username = $req->username;
        $candidate->email = $req->email;
        $candidate->biography = $req->biography;
        $candidate->phone = $req->phone;
        $candidate->address = $req->address;
        $candidate->country = $req->country;
        $candidate->stat = $req->stat;
        $candidate->city = $req->city;
        $candidate->zip_code = $req->zip_code;
        $candidate->gender = $req->sex;
        $candidate->marital_status = $req->marital_status;
        $candidate->date_of_birth = $req->date_of_birth;
        $candidate->website = $req->website;
        $candidate->update();

        return redirect()->back()->with('success', 'profile is updated successfully.');
    }

    public function reset_password()
    {
        return view('candidate.reset_password.reset_password');
    }

    public function reset_password_submit(Request $req)
    {
        $req->validate([
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password',
        ]);

        $guard = Auth::guard('candidate')->user();
        $user = $guard->username;

        $obj = Candidate::where('username', $user)->first();

        $obj->password = Hash::make( $req->new_password );
        $obj->update();

        return redirect()->back()->with('success', 'password updated successfully.');
    }
    /***Education */
    public function education()
    {
        $user = Auth::guard('candidate')->user();
        $education = CandidateEducation::where('candidate_id', $user->id)->get();

        return view('candidate.education.education', compact( 'education' ));
    }

    public function education_add()
    {
        return view('candidate.education.education_add');
    }

    public function education_submit(Request $req)
    {
        $user = Auth::guard('candidate')->user();

        $req->validate([
            'education_level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required',
        ]);

        $obj = new CandidateEducation();
        $obj->candidate_id = $user->id;
        $obj->level = $req->education_level;
        $obj->institute = $req->institute;
        $obj->degree = $req->degree;
        $obj->passing_year = $req->passing_year;
        $obj->save();

        return redirect()->route('candidate_education')->with('success', 'data saved successfully.');
    }

    public function education_edit($id)
    {
        $education = CandidateEducation::where('id', $id)->first();

        if( $education == '' )
            return redirect()->route('candidate_education');

        return view('candidate.education.education_edit', compact( 'education' ));
    }

    public function education_update(Request $req, $id)
    {
        $education = CandidateEducation::where('id', $id)->first();

        $req->validate([
            'education_level' => 'required',
            'institute' => 'required',
            'degree' => 'required',
            'passing_year' => 'required',
        ]);

        $education->level = $req->education_level;
        $education->institute = $req->institute;
        $education->degree = $req->degree;
        $education->passing_year = $req->passing_year;

        $education->update();

        return redirect()->route('candidate_education')->with('success', 'data is updated successfully');
    }

    public function education_delete($id)
    {
        CandidateEducation::where('id', $id)->delete();

        return redirect()->route('candidate_education')->with('success', 'data is deleted successfully');
    }
    /**Skill */
    public function skill()
    {
        $user = Auth::guard('candidate')->user();
        $skill = CandidateSkill::where('candidate_id', $user->id)->get();

        return view('candidate.skill.skill', compact( 'skill' ));
    }

    public function skill_add()
    {
        return view('candidate.skill.skill_add');
    }

    public function skill_submit(Request $req)
    {
        $user = Auth::guard('candidate')->user();

        $req->validate([
            'skill' => 'required',
            'percentage' => 'required',
        ]);

        $obj = new CandidateSkill();
        $obj->candidate_id = $user->id;
        $obj->skill = $req->skill;
        $obj->percentage = $req->percentage;
        $obj->save();

        return redirect()->route('candidate_skill')->with('success', 'data saved successfully.');
    }

    public function skill_edit($id)
    {
        $skill = CandidateSkill::where('id', $id)->first();

        if( $skill == '' )
            return redirect()->route('candidate_skill');

        return view('candidate.skill.skill_edit', compact( 'skill' ));
    }

    public function skill_update(Request $req, $id)
    {
        $skill = CandidateSkill::where('id', $id)->first();

        $req->validate([
            'skill' => 'required',
            'percentage' => 'required',
        ]);

        $skill->skill = $req->skill;
        $skill->percentage = $req->percentage;

        $skill->update();

        return redirect()->route('candidate_skill')->with('success', 'data is updated successfully');
    }

    public function skill_delete($id)
    {
        CandidateSkill::where('id', $id)->delete();

        return redirect()->route('candidate_skill')->with('success', 'data is deleted successfully');
    }
    /**Experience */
    public function experience()
    {
        $user = Auth::guard('candidate')->user();
        $experience = CandidateExperience::where('candidate_id', $user->id)->get();

        return view('candidate.experience.experience', compact( 'experience' ));
    }

    public function experience_add()
    {
        return view('candidate.experience.experience_add');
    }

    public function experience_submit(Request $req)
    {
        $user = Auth::guard('candidate')->user();

        $req->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $obj = new CandidateExperience();
        $obj->candidate_id = $user->id;
        $obj->company = $req->company;
        $obj->designation = $req->designation;
        $obj->start_date = $req->start_date;
        $obj->end_date = $req->end_date;
        $obj->save();

        return redirect()->route('candidate_experience')->with('success', 'data saved successfully.');
    }

    public function experience_edit($id)
    {
        $experience = CandidateExperience::where('id', $id)->first();

        if( $experience == '' )
            return redirect()->route('candidate_experience');

        return view('candidate.experience.experience_edit', compact( 'experience' ));
    }

    public function experience_update(Request $req, $id)
    {
        $obj = CandidateExperience::where('id', $id)->first();

        $req->validate([
            'company' => 'required',
            'designation' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ]);

        $obj->company = $req->company;
        $obj->designation = $req->designation;
        $obj->start_date = $req->start_date;
        $obj->end_date = $req->end_date;

        $obj->update();

        return redirect()->route('candidate_experience')->with('success', 'data is updated successfully');
    }

    public function experience_delete($id)
    {
        CandidateExperience::where('id', $id)->delete();

        return redirect()->route('candidate_experience')->with('success', 'data is deleted successfully');
    }
    /**Award */
    public function award()
    {
        $user = Auth::guard('candidate')->user();
        $award = CandidateAward::where('candidate_id', $user->id)->get();

        return view('candidate.award.award', compact( 'award' ));
    }

    public function award_add()
    {
        return view('candidate.award.award_add');
    }

    public function award_submit(Request $req)
    {
        $user = Auth::guard('candidate')->user();

        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $obj = new CandidateAward();
        $obj->candidate_id = $user->id;
        $obj->title = $req->title;
        $obj->description = $req->description;
        $obj->date = $req->date;
        $obj->save();

        return redirect()->route('candidate_award')->with('success', 'data saved successfully.');
    }

    public function award_edit($id)
    {
        $award = CandidateAward::where('id', $id)->first();

        if( $award == '' )
            return redirect()->route('candidate_award');

        return view('candidate.award.award_edit', compact( 'award' ));
    }

    public function award_update(Request $req, $id)
    {
        $obj = CandidateAward::where('id', $id)->first();

        $req->validate([
            'title' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $obj->title = $req->title;
        $obj->description = $req->description;
        $obj->date = $req->date;

        $obj->update();

        return redirect()->route('candidate_award')->with('success', 'data is updated successfully');
    }

    public function award_delete($id)
    {
        CandidateAward::where('id', $id)->delete();

        return redirect()->route('candidate_award')->with('success', 'data is deleted successfully');
    }
    /**Resume */
    public function resume()
    {
        $user = Auth::guard('candidate')->user();
        $resume = CandidateResume::where('candidate_id', $user->id)->get();

        return view('candidate.resume.resume', compact( 'resume' ));
    }

    public function resume_add()
    {
        return view('candidate.resume.resume_add');
    }

    public function resume_submit(Request $req)
    {
        $user = Auth::guard('candidate')->user();

        $req->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx',
        ]);

        $file = $req->file('file');
        $ext = $file->extension();
        $filename = 'candidate_resume_' . time() . '.' . $ext;
        $file = $file->move( public_path( 'uploads/candidate/resume/' ), $filename );

        $obj = new CandidateResume();
        $obj->candidate_id = $user->id;
        $obj->name = $req->name;
        $obj->file = $filename;
        $obj->save();

        return redirect()->route('candidate_resume')->with('success', 'data saved successfully.');
    }

    public function resume_edit($id)
    {
        $resume = CandidateResume::where('id', $id)->first();

        if( $resume == '' )
            return redirect()->route('candidate_resume');

        return view('candidate.resume.resume_edit', compact( 'resume' ));
    }

    public function resume_update(Request $req, $id)
    {
        $obj = CandidateResume::where('id', $id)->first();

        $req->validate([
            'name' => 'required',
            'file' => 'required|mimes:pdf,doc,docx',
        ]);

        $file = $req->file('file');
        $ext = $file->extension();
        $filename = 'candidate_resume_' . time() . '.' . $ext;

        if( $obj->file !== '' )
            unlink( public_path( 'uploads/candidate/resume/' . $obj->file ) );
        
        $file = $file->move( public_path( 'uploads/candidate/resume/' ), $filename );

        $obj->name = $req->name;
        $obj->file = $filename;

        $obj->update();

        return redirect()->route('candidate_resume')->with('success', 'data is updated successfully');
    }

    public function resume_delete($id)
    {
        $file = CandidateResume::where('id', $id);
        $filename = $file->first();
        unlink( public_path( 'uploads/candidate/resume/' . $filename->file ) );
        $file->delete();

        return redirect()->route('candidate_resume')->with('success', 'data is deleted successfully');
    }

    public function bookmark_add($id)
    {
        $userid = Auth::guard('candidate')->user()->id;

        $bookmark = CandidateBookmark::where('candidate_id', $userid)->where('job_id', $id);
        $count_book = $bookmark->count();

        if( $count_book > 0 ) {
            $bookmark->delete();
            return redirect()->back()->with('success', 'Job is unbookmarked successfully.');
        }

        $save = new CandidateBookmark();
        $save->candidate_id = $userid;
        $save->job_id = $id;
        $save->save();

        return redirect()->back()->with('success', 'Job is added to bookmark ssection successfully.');
    }

    public function bookmark_list()
    {
        $id = Auth::guard('candidate')->user()->id;
        $bookmark = CandidateBookmark::with('rJob')->where('candidate_id', $id)->get();
        
        return view('candidate.bookmark.bookmark', compact( 'bookmark' ));
    }

    public function apply($id)
    {
        $info = Job::where('id', $id)->first();
        
        return view('candidate.apply.apply', compact( 'info' ));
    }

    public function apply_add(Request $req, $id)
    {

        if( !Auth::guard('candidate')->check() )
            return redirect()->route('login');

        $req->validate([ 'cover_letter' => 'required' ]);
        
        $userid = Auth::guard('candidate')->user()->id;

        $application = CandidateApplication::where('candidate_id', $userid)->where('job_id', $id);
        $count_app = $application->count();

        if( $count_app > 0 ) {
            return redirect()->back()->with('success', 'you applied for this job.');
        }

        $save = new CandidateApplication();
        $save->candidate_id = $userid;
        $save->job_id = $id;
        $save->cover_letter = $req->cover_letter;
        $save->status = 'Applied';

        $save->save();

        $job_info = Job::with('rCompany')->where('id', $id)->first();
        $company_email = $job_info->rCompany->email;

        // Sending email to company
        $applicants_list_url = route('company_applicant', $id);
        $subject = 'A person applied to a job';
        $message = 'Please check the application: ';
        $message .= '<a href="'.$applicants_list_url.'">Click here to see applicants list for this job</a>';

        $mailData = [
            'title' => $subject,
            'body' => $message,
        ];
        
        \Mail::to($company_email)->send(new Websitemail($mailData));

        return redirect()->back()->with('success', 'your application send successfully.');
    
    }

    public function apply_list()
    {
        $id = Auth::guard('candidate')->user()->id;
        
        $app = CandidateApplication::where('candidate_id', $id)->get();
        
        return view('candidate.apply.apply_list', compact( 'app' ));
    }
}
