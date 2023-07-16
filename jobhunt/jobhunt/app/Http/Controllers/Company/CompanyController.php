<?php

namespace App\Http\Controllers\Company;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Mail\WebSiteMail;
use App\Models\ {
    CandidateApplication,
    CandidateExperience,
    CandidateEducation,
    CandidateBookmark,
    CandidateResume,
    CandidateAward,
    CandidateSkill,
    Candidate,
    CompanyIndustry,
    CompanyLocation,
    CompanyFound,
    CompanyPhoto,
    CompanyVideo,
    CompanySize,
    Company,
    JobExperience,
    JobCategory,
    JobLocation,
    JobSalary,
    JobType,
    Job,
    Order,
    Package,
    Advertisment,
};
use Auth;
use Hash;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $company = Job::where('company_id', Auth::guard('company')->user()->id);
        
        $open_jobs = $company->count();;
        $featured_jobs = $company->where('is_featured', 1)->count();
        $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->orderBy('id', 'desc')->take(2)->get();

        return view('company.dashboard', compact( 
            'jobs',
            'open_jobs',
            'featured_jobs',
        ));
    }

    public function orders()
    {
        $orders = Order::with('rPackage')->orderBy('id', 'desc')->where('company_id', Auth::guard('company')->user()->id)->get();

        return view('company.orders', compact( 'orders' ));
    }

    public function logout()
    {
        Auth::guard('company')->logout();

        return redirect()->route('login');
    }

    public function make_payment()
    {
        $current_plan = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        $packages = Package::get();

        return view('company.make_payment', compact( 'current_plan', 'packages' ));
    }

    /* payment with paypal */
    
    public function paypal(Request $request)
    {
        $single_package_data = Package::where('id', $request->package_id)->first();
        $price = $single_package_data->package_price;
        
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('company_paypal_success'),
                "cancel_url" => route('company_paypal_cancel')
            ],
            "purchase_units" => [
                [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $price
                    ]
                ]
            ]
        ]);

        if(isset($response['id']) && $response['id']!=null) {
            foreach($response['links'] as $link) {
                if($link['rel'] === 'approve') {

                    session()->put('package_id', $single_package_data->id);
                    session()->put('package_price', $single_package_data->package_price);
                    session()->put('package_days', $single_package_data->package_days);

                    return redirect()->away($link['href']);
                }
            }
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status'] == 'COMPLETED') {

            $data['currently_active'] = 0;
            Order::where('company_id', Auth::guard()->user()->id)->update($data);

            $obj = new Order();
            $obj->company_id = Auth::guard()->user()->id;
            $obj->package_id = session()->get('package_id');
            $obj->order_number = time();
            $obj->paid_amount = session()->get('package_price');
            $obj->payment_method = 'PayPal';
            $obj->start_date = date('Y-m-d');
            $days = session()->get('package_days');
            $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
            $obj->currently_active = 1;
            $obj->save();

            session()->forget('package_id');
            session()->forget('package_price');
            session()->forget('package_days');

            return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
        } else {
            return redirect()->route('company_paypal_cancel');
        }
    }

    public function paypal_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled!');
    }

    /* payment with stripe */

    public function stripe(Request $request)
    {
        $single_package_data = Package::where('id',$request->package_id)->first();

        \Stripe\Stripe::setApiKey(config('stripe.stripe_sk'));
        $response = \Stripe\Checkout\Session::create([
            'line_items' => [
                [
                    'price_data' => [
                        'currency' => 'usd',
                        'product_data' => [
                            'name' => $single_package_data->package_name
                        ],
                        'unit_amount' => $single_package_data->package_price * 100,
                    ],
                    'quantity' => 1,
                ],
            ],
            'mode' => 'payment',
            'success_url' => route('company_stripe_success'),
            'cancel_url' => route('company_stripe_cancel'),
        ]);

        session()->put('package_id', $single_package_data->id);
        session()->put('package_price', $single_package_data->package_price);
        session()->put('package_days', $single_package_data->package_days);

        return redirect()->away($response->url);
        
    }

    public function stripe_success()
    {
        $data['currently_active'] = 0;
        Order::where('company_id', Auth::guard()->user()->id)->update($data);

        $obj = new Order();
        $obj->company_id = Auth::guard()->user()->id;
        $obj->package_id = session()->get('package_id');
        $obj->order_number = time();
        $obj->paid_amount = session()->get('package_price');
        $obj->payment_method = 'Stripe';
        $obj->start_date = date('Y-m-d');
        $days = session()->get('package_days');
        $obj->expire_date = date('Y-m-d', strtotime("+$days days"));
        $obj->currently_active = 1;
        $obj->save();

        session()->forget('package_id');
        session()->forget('package_price');
        session()->forget('package_days');

        return redirect()->route('company_make_payment')->with('success', 'Payment is successful!');
    }

    public function stripe_cancel()
    {
        return redirect()->route('company_make_payment')->with('error', 'Payment is cancelled!');
    }

    public function edit_profile()
    {
        $company_locations = CompanyLocation::orderBy('location', 'asc')->get();
        $company_industries = CompanyIndustry::orderBy('industry_name', 'asc')->get();
        $company_size = CompanySize::get();

        return view('company.edit_profile', compact( 
            'company_locations', 
            'company_industries', 
            'company_size', 
        ));
    }

    public function edit_profile_update(Request $req)
    {
        $company_user = Auth::guard('company')->user();        
        $id = $company_user->id;
        $obj = Company::where('id', $id)->first();
        
        $req->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => [ 'required', 'alpha_dash', Rule::unique('companies')->ignore($id) ],
            'email' => [ 'required', 'email', Rule::unique('companies')->ignore($id) ],
        ]);

        if( $req->hasFile( 'logo' ) ){
            $req->validate([
                'logo' => 'image|mimes:jpg,jpeg,png'
            ]);

            if( $company_user->company_logo != '' )
                unlink( public_path( 'uploads/company/' . $company_user->company_logo ) );

            $ext = $req->file('logo')->extension();
            $final_name = 'company_logo_' . time() . '.' . $ext;
            $req->file('logo')->move( public_path( 'uploads/company' ), $final_name );
            
            $obj->company_logo = $final_name;
        }

        $obj->company_name = $req->company_name;
        $obj->person_name = $req->person_name;
        $obj->username = $req->username;
        $obj->email = $req->email;
        $obj->phone = $req->company_phone;
        $obj->address = $req->company_address;
        $obj->website = $req->company_website;
        $obj->company_location_id = $req->company_location;
        $obj->company_size_id = $req->company_size;
        $obj->company_industry_id = $req->company_size;
        $obj->founded_on = $req->company_found;
        $obj->description = $req->description;
        $obj->oh_mon = $req->oh_mon;
        $obj->oh_tue = $req->oh_tue;
        $obj->oh_wed = $req->oh_wed;
        $obj->oh_thu = $req->oh_thu;
        $obj->oh_fri = $req->oh_fri;
        $obj->oh_sat = $req->oh_sat;
        $obj->oh_sun = $req->oh_sun;
        $obj->map_code = $req->map_code;
        $obj->facebook = $req->facebook;
        $obj->twitter = $req->twitter;
        $obj->linkedin = $req->linkedin;
        $obj->instagram = $req->instagram;

        $obj->update();

        return redirect()->route('company_edit_profile')->with('success', 'Data updated successfully!');
    }

    public function edit_password()
    {
        return view('company.edit_password');
    }

    public function edit_password_update(Request $req)
    {
        $company_user = Auth::guard('company')->user();        
        $id = $company_user->id;

        $obj = Company::where('id', $id)->first();
        
        $req->validate([
            'new_password' => 'required',
            'retype_password' => 'required|same:new_password',
        ]);

        $obj->password = Hash::make($req->new_password);

        $obj->update();

        return redirect()->route('company_edit_password')->with('success', 'password changed successfully!');
    }

    /******* Photos ********/
    public function photo()
    {
        $AccessPhoto = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        // if user package expired:
            if( date('Y-m-d') > $AccessPhoto->expire_date )
                return redirect()->back()->with('error', 'your package expired!');

        // if a user dont have any package:
        if( !isset($AccessPhoto) )
            return redirect()->route('company_dashboard')->with('error', 'you dont have any package.');
    
        //checking packages: 
        $AccessPhoto = $AccessPhoto->rPackage->total_allowed_photos;
        if( $AccessPhoto == 0 )
            return redirect()->route('company_dashboard')->with('error', 'To Continue, Upgrade your package.');
        
        $id = Auth::guard('company')->user()->id;
        $image = CompanyPhoto::where('company_id', $id)->get();
        
        return view('company.photos', compact( 'image' ));
    }

    public function photo_submit(Request $req)
    {
        $id = Auth::guard('company')->user()->id;
        $package_id = Order::where('company_id', $id)->where('currently_active', 1)->first();

        $package_info = Package::where('id', $package_id->package_id)->first();
        $count_photos = CompanyPhoto::where('company_id', $id)->count();
        $total_photos_package = $package_info->total_allowed_photos;

        if( $count_photos == $total_photos_package )
            return redirect()->back()->with('error', 'your maximum upload photos is ' . $total_photos_package);

        $req->validate([
            'photo' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $obj = new CompanyPhoto();

        $ext = $req->file('photo')->extension();
        $final_name = 'company_photo_' . time() . '.' . $ext;
        $req->file('photo')->move( public_path('uploads/company/photos/'), $final_name );

        $obj->photo = $final_name;
        $obj->company_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'photo uploaded successfully.');
    }

    public function photo_delete($id, $photo, $companyid)
    {
        CompanyPhoto::where('id', $id)->where('photo', $photo)->where('company_id', $companyid)->delete();

        unlink( public_path('uploads/company/photos/') . $photo );

        return redirect()->back()->with('success', 'photo deleted successfully.');
    }

    /******* Videos *******/
    public function video()
    {
        $AccessVideo = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();

        // if user package expired:
            if( date('Y-m-d') > $AccessVideo->expire_date )
            return redirect()->back()->with('error', 'your package expired!');

        // if a user dont have any package:
        if( !isset($AccessVideo) )
            return redirect()->route('company_dashboard')->with('error', 'you dont have any package.');

        //checking packages: 
        $AccessVideo = $AccessVideo->rPackage->total_allowed_videos;
        if( $AccessVideo == 0 )
            return redirect()->route('company_dashboard')->with('error', 'To Continue, Upgrade your package.');
        
        $id = Auth::guard('company')->user()->id;
        $video = CompanyVideo::where('company_id', $id)->get();
        
        return view('company.videos', compact( 'video' ));
    }

    public function video_submit(Request $req)
    {
        $id = Auth::guard('company')->user()->id;
        $package_id = Order::where('company_id', $id)->where('currently_active', 1)->first();

        $package_info = Package::where('id', $package_id->package_id)->first();
        $count_videos = CompanyVideo::where('company_id', $id)->count();
        $total_videos_package = $package_info->total_allowed_videos;

        if( $count_videos == $total_videos_package )
            return redirect()->back()->with('error', 'your maximum upload videos is ' . $total_videos_package);

        $req->validate([
            'video_id' => 'required'
        ]);

        $obj = new CompanyVideo();

        $obj->video_id = $req->video_id;
        $obj->company_id = $id;
        $obj->save();

        return redirect()->back()->with('success', 'video saved successfully.');
    }

    public function video_delete($id, $video, $companyid)
    {
        CompanyVideo::where('id', $id)->where('video_id', $video)->where('company_id', $companyid)->delete();

        return redirect()->back()->with('success', 'video deleted successfully.');
    }

    /******* Job *******/
    public function job_create()
    {
        $AccessJobs = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $AccessJobsCount = isset( $AccessJobs ) ? $AccessJobs->rPackage->total_allowed_jobs : 0;
        // if a user dont have any package:
        if( !isset($AccessJobs) || $AccessJobsCount == 0 )
            return redirect()->route('company_dashboard')->with('error', 'To Continue for post jobs, buy Standard | Gold Packages.');

        // if user package expired:
        if( date('Y-m-d') > $AccessJobs->expire_date )
            return redirect()->back()->with('error', 'your package expired!');
   

        $job_category = JobCategory::get();
        $job_location = JobLocation::get();
        $job_type = JobType::get();
        $job_salary = JobSalary::get();
        $job_experience = JobExperience::get();

        return view('company.job_create', compact(
            'job_category',
            'job_location',
            'job_type',
            'job_salary',
            'job_experience',
        ));
    }

    public function job_create_submit(Request $req)
    {
        $id = Auth::guard('company')->user()->id;
        $AccessJobs = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $jobs_count = Job::where('company_id', $id)->count();

        if( isset( $AccessJobs ) ){

            if( $AccessJobs->rPackage->total_allowed_jobs == $jobs_count )
                return redirect()->back()->with('error', 'your maximum post jobs is ' . $jobs_count);
            
            if( $req->is_featured == 1 ){
                $jobs_featured_count = Job::where('company_id', $id)->where('is_featured', 1)->count();
                if( $AccessJobs->rPackage->total_allowed_featured_jobs == $jobs_featured_count )
                    return redirect()->back()->with('error', 'yout already have added the total nubmer of featured jobs.');
            }
        }

        $req->validate([
            "title" => 'required',
            "description" => 'required',
            "deadline" => 'required',
            "vacancy" => 'required',
        ]);

        $obj = new Job();

        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->title = $req->title;
        $obj->description = $req->description;
        $obj->responsibility = $req->responsibilities;
        $obj->skill = $req->skills;
        $obj->education = $req->educational;
        $obj->benifit = $req->benifits;
        $obj->deadline = $req->deadline;
        $obj->vacancy = $req->vacancy;
        $obj->job_category_id = $req->job_category_id;
        $obj->job_location_id = $req->job_location_id;
        $obj->job_type_id = $req->job_type_id;
        $obj->job_experience_id = $req->job_experience_id;
        $obj->job_gender_id = $req->job_gender_id;
        $obj->job_salary_range_id = $req->job_salary_range_id;
        $obj->map_code = $req->map_code;
        $obj->is_featured = $req->is_featured;
        $obj->is_urgent = $req->is_urgent;

        $obj->save();

        return redirect()->back()->with('success', 'Job posted successfully.');
    }

    public function jobs()
    {
        $jobs = Job::where('company_id', Auth::guard('company')->user()->id)->get();

        return view('company.jobs', compact( 'jobs' ));
    }

    public function job_edit($id)
    {
        $job = job::where('id', $id)->where('company_id', Auth::guard('company')->user()->id)->first();

        $job_category = JobCategory::get();
        $job_location = JobLocation::get();
        $job_type = JobType::get();
        $job_salary = JobSalary::get();
        $job_experience = JobExperience::get();

        return view('company.job_edit', compact( 
            'job',
            'job_category',
            'job_location',
            'job_type',
            'job_salary',
            'job_experience',
        ));
    }

    public function job_update(Request $req, $id)
    {
        $id = Auth::guard('company')->user()->id;
        $AccessJobs = Order::with('rPackage')->where('company_id', Auth::guard('company')->user()->id)->where('currently_active', 1)->first();
        $jobs_count = Job::where('company_id', $id)->count();

        if( isset( $AccessJobs ) ){

            if( $AccessJobs->rPackage->total_allowed_jobs == $jobs_count )
                return redirect()->back()->with('error', 'your maximum post jobs is ' . $jobs_count);
            
            if( $req->is_featured == 1 ){
                $jobs_featured_count = Job::where('company_id', $id)->where('is_featured', 1)->count();
                if( $AccessJobs->rPackage->total_allowed_featured_jobs == $jobs_featured_count )
                    return redirect()->back()->with('error', 'yout already have added the total nubmer of featured jobs.');
            }
        }

        $obj = Job::where('id', $id)->where('company_id', Auth::guard('company')->user()->id)->first();
 
        $req->validate([
            "title" => 'required',
            "description" => 'required',
            "deadline" => 'required',
            "vacancy" => 'required',
        ]);

        $obj->company_id = Auth::guard('company')->user()->id;
        $obj->title = $req->title;
        $obj->description = $req->description;
        $obj->responsibility = $req->responsibilities;
        $obj->skill = $req->skills;
        $obj->education = $req->educational;
        $obj->benifit = $req->benifits;
        $obj->deadline = $req->deadline;
        $obj->vacancy = $req->vacancy;
        $obj->job_category_id = $req->job_category_id;
        $obj->job_location_id = $req->job_location_id;
        $obj->job_type_id = $req->job_type_id;
        $obj->job_experience_id = $req->job_experience_id;
        $obj->job_gender_id = $req->job_gender_id;
        $obj->job_salary_range_id = $req->job_salary_range_id;
        $obj->map_code = $req->map_code;
        $obj->is_featured = $req->is_featured;
        $obj->is_urgent = $req->is_urgent;
        $obj->update();

        return redirect()->back()->with('success', 'post updated successfully.');
    }

    public function job_delete($id)
    {
        $job = Job::where('id', $id)->where('company_id', Auth::guard('company')->user()->id);
        $job->delete();

        $candidate_application = CandidateApplication::where('job_id', $id);
        $candidate_application->delete();

        $candidate_bookmark = CandidateBookmark::where('job_id', $id);
        $candidate_bookmark->delete();
        return redirect()->route('company_jobs')->with('success', 'post is deleted successfully.');
    }

    /******** Candidate Applicant */
    public function candidate_application()
    {
        $id = Auth::guard('company')->user()->id;
        
        $jobs = Job::where('company_id', $id)->get();
        
        return view('company.applications', compact( 'jobs' ));
    }

    public function applicant($id)
    {
        $applicant = CandidateApplication::where('job_id', $id)->get();

        $job = Job::where('id', $id)->first();

        return view('company.applicant', compact( 'applicant', 'job' ));
    }

    public function applicant_resume($id)
    {
        $candidate = Candidate::where('id', $id)->first();

        $candidate_experience = CandidateExperience::where('candidate_id', $id)->get();
        $candidate_education = CandidateEducation::where('candidate_id', $id)->get();
        $candidate_bookmark = CandidateBookmark::where('candidate_id', $id)->get();
        $candidate_resume = CandidateResume::where('candidate_id', $id)->get();
        $candidate_award = CandidateAward::where('candidate_id', $id)->get();
        $candidate_skill = CandidateSkill::where('candidate_id', $id)->get();
        
        return view('company.applicant_resume', compact( 
            'candidate',
            'candidate_experience',
            'candidate_education',
            'candidate_bookmark',
            'candidate_resume',
            'candidate_award',
            'candidate_skill',
        ));
    }

    public function application_status_change(Request $req)
    {
        $req->validate([
            'status' => 'required'
        ]);

        $candidate_app = CandidateApplication::where('candidate_id', $req->candidate_id)->where('job_id', $req->job_id)->first();

        $candidate_app->status = $req->status;

        $candidate_app->update();

        $candidate_email = $candidate_app->rCandidate->email;

        if($req->status == 'approved') {
            // Sending email to candidates
            $detail_link = route('candidate_apply_list');
            $subject = 'Congratulation! Your application is approved';
            $message = 'Please check the detail: <br>';
            $message .= '<a href="'.$detail_link.'">Click here to see the detail</a>';

            $mailData = [
                'title' => $subject,
                'body' => $message,
            ];

            \Mail::to($candidate_email)->send(new WebSiteMail($mailData));
        }

        return redirect()->back()->with('success', 'status change successfull.');
    }
}
