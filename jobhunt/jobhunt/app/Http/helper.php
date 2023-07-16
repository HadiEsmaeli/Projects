<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Models\ {
    Order,
};

/* Front Controllers */

use App\Http\Controllers\Front\ { 
    ForgetPasswordController,
    JobCategoryController,
    SubscriberController,
    CompaniesController,
    PostBlogController,
    PrivacyController,
    ContactController,
    SignupController,
    PriceController,
    LoginController,
    HomeController,
    JobsController,
    TermController,
    BlogController,
    FaqController,
};

/* Admin Controllers */

use App\Http\Controllers\Admin\UserAdmin\ {
    AdminLoginController,
    AdminProfileController,
};

use App\Http\Controllers\Admin\JobCategory\ {
    AdminJobCategoryController,
};

use App\Http\Controllers\Admin\JobLocation\ {
    AdminJobLocationController,
};

use App\Http\Controllers\Admin\JobType\ {
    AdminJobTypeController,
};

use App\Http\Controllers\Admin\Experience\ {
    AdminExperienceController,
};

use App\Http\Controllers\Admin\Salary\ {
    AdminSalaryController,
};

use App\Http\Controllers\Admin\Companies\ {
    AdminCompanyLocationController,
    AdminCompanyIndustryController,
    AdminCompanyFoundController,
    AdminCompanySizeController,
    AdminCompanyController,
};

use App\Http\Controllers\Admin\Candidate\ {
    AdminCandidateController,
};

use App\Http\Controllers\Admin\Testimonial\ {
    AdminTestimonialController,
};

use App\Http\Controllers\Admin\WhyChoose\ {
    AdminWhyChooseController,
};

use App\Http\Controllers\Admin\Post\ {
    AdminPostController,
};

use App\Http\Controllers\Admin\Package\ {
    AdminPackageController,
};

use App\Http\Controllers\Admin\Advertisment\ {
    AdminAdvertismentController,
};

use App\Http\Controllers\Admin\Faq\ {
    AdminFaqPageController,
    AdminFaqController,
};

use App\Http\Controllers\Admin\Banner\ {
    AdminBannerController,
};

use App\Http\Controllers\Admin\Subscriber\ {
    AdminSubscriberController,
};

use App\Http\Controllers\Admin\ {
    AdminTermPageController,
    AdminPrivacyPageController,
    AdminContactPageController,
    AdminBlogPageController,
    AdminJobCategoryPageController,
    AdminPricingPageController,
    AdminOtherPageController,
};

use App\Http\Controllers\Admin\ {
    AdminHomePageController,
    AdminSettingController,
    AdminHomeController,
};

/* Company Controllers */

use App\Http\Controllers\Company\ {
    CompanyController,
};

use App\Http\Controllers\Candidate\ {
    CandidateController,
};

function route_list()
{
    return [
        'FRONT_ROUTES' => [
            0 => [
                'class' => HomeController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ '' ],
                'route' => [ 'home' ]
            ],
            1 => [
                'class' => JobsController::class,
                'method' => [ 
                    'listingjob', 
                    'detail_job', 
                    'enquery',
                ],
                'route_method' => [ 
                    "Route::get", 
                    "Route::get", 
                    "Route::post", 
                ],
                'route_addr' => [ 
                    'jobs', 
                    'detail-job/{id}', 
                    'job-enquery/email/{id}',
                ],
                'route' => [ 
                    'job_listing', 
                    'detail_job', 
                    'job_enquery', 
                ]
            ],
            2 => [
                'class' => TermController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'terms' ],
                'route' => [ 'terms' ]
            ],
            3 => [
                'class' => JobCategoryController::class,
                'method' => [ 'categories' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'job-categories' ],
                'route' => [ 'job_categories' ]
            ],
            4 => [
                'class' => PostBlogController::class,
                'method' => [ 'post' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'post-blog/{slug}' ],
                'route' => [ 'post' ]
            ],
            5 => [
                'class' => BlogController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'blog' ],
                'route' => [ 'blog' ]
            ],
            6 => [
                'class' => FaqController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'faq' ],
                'route' => [ 'faq' ]
            ],
            7 => [
                'class' => PriceController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'pricing' ],
                'route' => [ 'pricing' ]
            ],
            8 => [
                'class' => PrivacyController::class,
                'method' => [ 'index' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'policy-privacy' ],
                'route' => [ 'privacy' ]
            ],
            9 => [
                'class' => ContactController::class,
                'method' => [ 
                    'index', 
                    'store' 
                ],
                'route_method' => [ 
                    "Route::get", 
                    "Route::post" 
                ],
                'route_addr' => [ 
                    'contact', 
                    'contact-store' 
                ],
                'route' => [ 
                    'contact', 
                    'contact_store' 
                ]
            ],
            10 => [
                'class' => LoginController::class,
                'method' => [ 'login' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'login' ],
                'route' => [ 'login' ]
            ],
            11 => [
                'class' => SignupController::class,
                'method' => [ 'signup' ],
                'route_method' => [ "Route::get" ],
                'route_addr' => [ 'signup' ],
                'route' => [ 'signup' ]
            ],
            12 => [
                'class' => CompaniesController::class,
                'method' => [ 'index', 'detail', 'contact_mail' ],
                'route_method' => [ "Route::get", "Route::get", "Route::post" ],
                'route_addr' => [ 'companies', 'company-detail/{id}', 'contact-mail/{id}' ],
                'route' => [ 'companies', 'company_detal', 'contact_mail' ]
            ],
            13 => [
                'class' => SubscriberController::class,
                'method' => [ 
                    'send_email',
                    'verify',
                ],
                'route_method' => [
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [
                    'subscriber-send-email',
                    'subscriber-verify-email/{email}/{token}',
                ],
                'route' => [
                    'subscriber_send_email',
                    'subscriber_verify_email',
                ]
            ],
        ],
        'CANDIDATE' => [
            0 => [
                'class' => SignupController::class,
                'method' => [ 
                    'signup_candidate', 
                    'candidate_signup_verify',
                ],
                'route_method' => [ 
                    "Route::post", 
                    "Route::get",
                ],
                'route_addr' => [ 
                    'signup', 
                    'signup-verify/{token}/{email}',
                ],
                'route' => [ 
                    'signup_candidate', 
                    'candidate_signup_verify', 
                ],
            ],
            1 => [
                'class' => ForgetPasswordController::class,
                'method' => [ 
                    'forgetpassword_candidate',
                    'forgetpassword_candidate_submit',
                    'resetpassword_candidate',
                    'resetpassword_candidate_submit',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'forget-password', 
                    'forget-password-submit',
                    'reset-password/{token}/{email}',
                    'reset-password-submit',
                ],
                'route' => [ 
                    'forgetpassword_candidate', 
                    'forgetpassword_candidate_submit',
                    'reset_password_candidate',
                    'resetpassword_candidate_submit',
                ],
            ],
            2 => [
                'class' => LoginController::class,
                'method' => [ 
                    'login_candidate', 
                ],
                'route_method' => [ 
                    "Route::post", 
                ],
                'route_addr' => [ 
                    'login', 
                ],
                'route' => [ 
                    'login_candidate', 
                ]
            ],
        ],
        'COMPANY' => [
            0 => [
                'class' => SignupController::class,
                'method' => [
                    'signup_company',
                    'company_signup_verify',
                ],
                'route_method' => [
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [
                    'signup',
                    'signup-verify/{token}/{email}',
                ],
                'route' => [
                    'signup_company',
                    'company_signup_verify',
                ]
            ],
            1 => [
                'class' => LoginController::class,
                'method' => [
                    'login_company',
                ],
                'route_method' => [
                    "Route::post",
                ],
                'route_addr' => [
                    'login',
                ],
                'route' => [
                    'login_company',
                ]
            ],
            2 => [
                'class' => ForgetPasswordController::class,
                'method' => [ 
                    'forgetpassword_company',
                    'forgetpassword_company_submit',
                    'resetpassword_company',
                    'resetpassword_company_submit',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'forget-password', 
                    'forget-password-submit',
                    'reset-password/{token}/{email}',
                    'reset-password-submit',
                ],
                'route' => [ 
                    'forgetpassword_company', 
                    'forgetpassword_company_submit',
                    'reset_password_company',
                    'resetpassword_company_submit',
                ],
            ],
        ],
        'CANDIDATE_WHEN_LOGIN' => [
            0 => [
                'class' => CandidateController::class,
                'method' => [
                    'edit_profile',
                    'profile_update',
                    'reset_password',
                    'reset_password_submit',
                    'education',
                    'education_add',
                    'education_submit',
                    'education_edit',
                    'education_update',
                    'education_delete',
                    'skill',
                    'skill_add',
                    'skill_submit',
                    'skill_edit',
                    'skill_update',
                    'skill_delete',
                    'experience',
                    'experience_add',
                    'experience_submit',
                    'experience_edit',
                    'experience_update',
                    'experience_delete',
                    'award',
                    'award_add',
                    'award_submit',
                    'award_edit',
                    'award_update',
                    'award_delete',
                    'resume',
                    'resume_add',
                    'resume_submit',
                    'resume_edit',
                    'resume_update',
                    'resume_delete',
                    'bookmark_add',
                    'bookmark_list',
                    'apply',
                    'apply_add',
                    'apply_list',
                ],
                'route_method' => [
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [
                    'edit-profile',
                    'profile-update',
                    'reset-password',
                    'reset-password-submit',
                    'education',
                    'education-add',
                    'education-submit',
                    'education-edit/{id}',
                    'education-update/{id}',
                    'education-delete/{id}',
                    'skill',
                    'skill-add',
                    'skill-submit',
                    'skill-edit/{id}',
                    'skill-update/{id}',
                    'skill-delete/{id}',
                    'experience',
                    'experience-add',
                    'experience-submit',
                    'experience-edit/{id}',
                    'experience-update/{id}',
                    'experience-delete/{id}',
                    'award',
                    'award-add',
                    'award-submit',
                    'award-edit/{id}',
                    'award-update/{id}',
                    'award-delete/{id}',
                    'resume',
                    'resume-add',
                    'resume-submit',
                    'resume-edit/{id}',
                    'resume-update/{id}',
                    'resume-delete/{id}',
                    'candidate-bookmark/{id}',
                    'bookmark-list',
                    'apply/{id}',
                    'apply-add/{id}',
                    'apply-list',
                ],
                'route' => [
                    'candidate_edit_profile',
                    'candidate_profile_update',
                    'candidate_reset_password',
                    'candidate_reset_password_submit',
                    'candidate_education',
                    'candidate_education_add',
                    'candidate_education_submit',
                    'candidate_education_edit',
                    'candidate_education_update',
                    'candidate_education_delete',
                    'candidate_skill',
                    'candidate_skill_add',
                    'candidate_skill_submit',
                    'candidate_skill_edit',
                    'candidate_skill_update',
                    'candidate_skill_delete',
                    'candidate_experience',
                    'candidate_experience_add',
                    'candidate_experience_submit',
                    'candidate_experience_edit',
                    'candidate_experience_update',
                    'candidate_experience_delete',
                    'candidate_award',
                    'candidate_award_add',
                    'candidate_award_submit',
                    'candidate_award_edit',
                    'candidate_award_update',
                    'candidate_award_delete',
                    'candidate_resume',
                    'candidate_resume_add',
                    'candidate_resume_submit',
                    'candidate_resume_edit',
                    'candidate_resume_update',
                    'candidate_resume_delete',
                    'candidate_bookmark_add',
                    'candidate_bookmark_list',
                    'candidate_apply',
                    'candidate_apply_add',
                    'candidate_apply_list',
                ]
            ],
        ],
        'COMPANY_WHEN_LOGIN' => [
            0 => [
                'class' => CompanyController::class,
                'method' => [ 
                    'dashboard', 
                    'orders', 
                    'logout', 
                    'make_payment',
                    'edit_profile',
                    'edit_profile_update',
                    'photo',
                    'photo_submit',
                    'photo_delete',
                    'video',
                    'video_submit',
                    'video_delete',
                    'edit_password',
                    'edit_password_update',
                    'job_create',
                    'job_create_submit',
                    'jobs',
                    'job_edit',
                    'job_update',
                    'job_delete',
                    'candidate_application',
                    'applicant',
                    'applicant_resume',
                    'application_status_change',
                ],
                'route_method' => [ 
                    "Route::get", 
                    "Route::get", 
                    "Route::get", 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'dashboard', 
                    'orders', 
                    'logout', 
                    'make-payment',
                    'edit-profile',
                    'edit-profile-update',
                    'photo',
                    'photo-submit',
                    'photo-delete/{id}/{photo}/{companyid}',
                    'video',
                    'video-submit',
                    'video-delete/{id}/{video}/{companyid}',
                    'edit-password',
                    'edit-password-update',
                    'job-create',
                    'job-create-submit',
                    'jobs',
                    'job-edit/{id}',
                    'job-update/{id}',
                    'job-delete/{id}',
                    'candidate-applications',
                    'applicants/{id}',
                    'applicant-detail/{id}',
                    'application-status-change',
                ],
                'route' => [ 
                    'company_dashboard', 
                    'company_orders', 
                    'company_logout', 
                    'company_make_payment',
                    'company_edit_profile',
                    'company_edit_profile_update',
                    'company_photos',
                    'company_photo_submit',
                    'company_photo_delete',
                    'company_videos',
                    'company_video_submit',
                    'company_video_delete',
                    'company_edit_password',
                    'company_edit_password_update',
                    'company_job_create',
                    'company_job_create_submit',
                    'company_jobs',
                    'company_job_edit',
                    'company_job_update',
                    'company_job_delete',
                    'company_candidate_application',
                    'company_applicant',
                    'company_applicant_detail',
                    'company_application_status',
                ]
            ],
        ],
        'ADMIN_LOGIN' => [
            0 => [
                'class' => AdminLoginController::class,
                'method' => [
                    'index',
                    'login_submit',
                    'logout',
                    'forget_password',
                    'forget_password_submit',
                ],
                'route_method' => [
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [
                    'login',
                    'login-submit',
                    'logout',
                    'forget-password',
                    'forget-password-submit',
                ],
                'route' => [
                    'admin_login',
                    'admin_login_submit',
                    'admin_logout',
                    'admin_forget_password',
                    'admin_forget_password_submit',
                ]
            ],
        ],
        'ADMIN_PANEL_FRONT_PAGES' => [
            0 => [
                'class' => AdminHomeController::class,
                'method' => [ 'index', ],
                'route_method' => [ "Route::get", ],
                'route_addr' => [ 'home', ],
                'route' => [ 'admin_home', ],
            ], /* Admin home */
            1 => [
                'class' => AdminProfileController::class,
                'method' => [ 
                    'index',
                ],
                'route_method' => [ 
                    "Route::get",
                ],
                'route_addr' => [ 
                    'edit-profile',
                ],
                'route' => [ 
                    'admin_profile',
                ],
            ], /* Admin edit-profile */
            2 => [
                'class' => AdminHomePageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'home-page',
                    'home-page/update',
                ],
                'route' => [ 
                    'admin_home_page',
                    'admin_home_page_update',
                ],
            ], /* Admin home-page */
            3 => [
                'class' => AdminFaqPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'faq-page',
                    'faq-page/update',
                ],
                'route' => [ 
                    'admin_faq_page',
                    'admin_faq_page_update',
                ],
            ], /* Admin faq-page */
            4 => [
                'class' => AdminBlogPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'blog-page',
                    'blog-page/update',
                ],
                'route' => [ 
                    'admin_blog_page',
                    'admin_blog_page_update',
                ],
            ], /* Admin blog-page */
            5 => [
                'class' => AdminTermPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'term-page',
                    'term-page/update',
                ],
                'route' => [ 
                    'admin_term_page',
                    'admin_term_page_update',
                ],
            ], /* Admin term-page */
            6 => [
                'class' => AdminPrivacyPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'privacy-page',
                    'privacy-page/update',
                ],
                'route' => [ 
                    'admin_privacy_page',
                    'admin_privacy_page_update',
                ],
            ], /* Admin policy-privacy-page */
            7 => [
                'class' => AdminContactPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'contact-page',
                    'contact-page/update',
                ],
                'route' => [ 
                    'admin_contact_page',
                    'admin_contact_page_update',
                ],
            ], /* Admin contact-page */
            8 => [
                'class' => AdminJobCategoryPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'jobcategory-page',
                    'jobcategory-page/update',
                ],
                'route' => [ 
                    'admin_job_category_page',
                    'admin_job_category_page_update',
                ],
            ], /* Admin jobcategory-page */
            9 => [
                'class' => AdminPricingPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'pricing-page',
                    'pricing-page/update',
                ],
                'route' => [ 
                    'admin_pricing_page',
                    'admin_pricing_page_update',
                ],
            ], /* Admin pricing-page */
            10 => [
                'class' => AdminOtherPageController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'other-page',
                    'other-page/update',
                ],
                'route' => [ 
                    'admin_other_page',
                    'admin_other_page_update',
                ],
            ], /* Admin other-page */
            11 => [
                'class' => AdminSettingController::class,
                'method' => [ 
                    'index',
                    'update',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [ 
                    'settings',
                    'settings/update',
                ],
                'route' => [ 
                    'admin_settings',
                    'admin_settings_update',
                ],
            ], /* Admin Settings */
        ],
        'ADMIN_PANEL_MANAGE_JOB_CATEGORY_SECTION' => [
            0 => [
                'class' => AdminJobCategoryController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_job_category',
                    'admin_job_category_create',
                    'admin_job_category_store',
                    'admin_job_category_edit',
                    'admin_job_category_update',
                    'admin_job_category_delete',
                ],
            ], /* Admin job-category */
        ],
        'ADMIN_PANEL_MANAGE_JOB_LOCATION_SECTION' => [
            0 => [
                'class' => AdminJobLocationController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_job_location',
                    'admin_job_location_create',
                    'admin_job_location_store',
                    'admin_job_location_edit',
                    'admin_job_location_update',
                    'admin_job_location_delete',
                ],
            ], /* Admin job-location */
        ],
        'ADMIN_PANEL_MANAGE_JOB_TYPE_SECTION' => [
            0 => [
                'class' => AdminJobTypeController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_job_type',
                    'admin_job_type_create',
                    'admin_job_type_store',
                    'admin_job_type_edit',
                    'admin_job_type_update',
                    'admin_job_type_delete',
                ],
            ], /* Admin job-type */
        ],
        'ADMIN_PANEL_MANAGE_EXPERIENCE_SECTION' => [
            0 => [
                'class' => AdminExperienceController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_experience',
                    'admin_experience_create',
                    'admin_experience_store',
                    'admin_experience_edit',
                    'admin_experience_update',
                    'admin_experience_delete',
                ],
            ], /* Admin job-experience */
        ],
        'ADMIN_PANEL_MANAGE_SALARY_RANGE_SECTION' => [
            0 => [
                'class' => AdminSalaryController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_salary',
                    'admin_salary_create',
                    'admin_salary_store',
                    'admin_salary_edit',
                    'admin_salary_update',
                    'admin_salary_delete',
                ],
            ], /* Admin salary range */
        ],
        'ADMIN_PANEL_MANAGE_COMPANY_LOCATION_SECTION' => [
            0 => [
                'class' => AdminCompanyLocationController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_company_location',
                    'admin_company_location_create',
                    'admin_company_location_store',
                    'admin_company_location_edit',
                    'admin_company_location_update',
                    'admin_company_location_delete',
                ],
            ], /* Admin Company Locations */
        ],
        'ADMIN_PANEL_MANAGE_COMPANY_INDUSTRY_SECTION' => [
            0 => [
                'class' => AdminCompanyIndustryController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_company_industry',
                    'admin_company_industry_create',
                    'admin_company_industry_store',
                    'admin_company_industry_edit',
                    'admin_company_industry_update',
                    'admin_company_industry_delete',
                ],
            ], /* Admin Company industrys */
        ],
        'ADMIN_PANEL_MANAGE_COMPANY_FOUND_SECTION' => [
            0 => [
                'class' => AdminCompanyFoundController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_company_found',
                    'admin_company_found_create',
                    'admin_company_found_store',
                    'admin_company_found_edit',
                    'admin_company_found_update',
                    'admin_company_found_delete',
                ],
            ], /* Admin Company Found */
        ],
        'ADMIN_PANEL_MANAGE_COMPANY_SIZE_SECTION' => [
            0 => [
                'class' => AdminCompanySizeController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_company_size',
                    'admin_company_size_create',
                    'admin_company_size_store',
                    'admin_company_size_edit',
                    'admin_company_size_update',
                    'admin_company_size_delete',
                ],
            ], /* Admin Company Size */
        ],
        'ADMIN_PANEL_MANAGE_COMPANY_SECTION' => [
            0 => [
                'class' => AdminCompanyController::class,
                'method' => [ 
                    'index',
                    'companies_detail',
                    'companies_jobs',
                    'companies_applicants',
                    'companies_applicant_resume',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'companies-view',
                    'companies-detail/{id}',
                    'companies-jobs/{id}',
                    'companies-applicants/{id}',
                    'companies-applicants-resume/{id}',
                    'companies-delete/{id}',
                ],
                'route' => [ 
                    'admin_companies',
                    'admin_companies_detail',
                    'admin_companies_jobs',
                    'admin_companies_applicants',
                    'admin_companies_applicant_resume',
                    'admin_companies_delete',
                ],
            ], /* Admin companies */
        ],
        'ADMIN_PANEL_MANAGE_CANDIDATE_SECTION' => [
            0 => [
                'class' => AdminCandidateController::class,
                'method' => [ 
                    'index',
                    'candidates_detail',
                    'candidates_applied_jobs',
                    'delete',
                ],
                'route_method' => [
                    "Route::get",
                    "Route::get",
                    "Route::get",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'candidates',
                    'candidates-detail/{id}',
                    'candidates-applied-jobs/{id}',
                    'candidates-delete/{id}',
                ],
                'route' => [ 
                    'admin_candidates',
                    'admin_candidates_detail',
                    'admin_candidates_applied_jobs',
                    'admin_candidates_delete',
                ],
            ], /* Admin candidates */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_WHY_CHOOSE_SECTION' => [
            0 => [
                'class' => AdminWhyChooseController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_why_choose',
                    'admin_why_choose_create',
                    'admin_why_choose_store',
                    'admin_why_choose_edit',
                    'admin_why_choose_update',
                    'admin_why_choose_delete',
                ],
            ], /* Admin why-choose */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_TESTIMONIAL_SECTION' => [
            0 => [
                'class' => AdminTestimonialController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_testimonial',
                    'admin_testimonial_create',
                    'admin_testimonial_store',
                    'admin_testimonial_edit',
                    'admin_testimonial_update',
                    'admin_testimonial_delete',
                ],
            ], /* Admin testimonial */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_POST_SECTION' => [
            0 => [
                'class' => AdminPostController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_post',
                    'admin_post_create',
                    'admin_post_store',
                    'admin_post_edit',
                    'admin_post_update',
                    'admin_post_delete',
                ],
            ], /* Admin post */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_FAQ_SECTION' => [
            0 => [
                'class' => AdminFaqController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_faq',
                    'admin_faq_create',
                    'admin_faq_store',
                    'admin_faq_edit',
                    'admin_faq_update',
                    'admin_faq_delete',
                ],
            ], /* Admin faq */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_PACKAGES_SECTION' => [
            0 => [
                'class' => AdminPackageController::class,
                'method' => [ 
                    'index',
                    'create',
                    'store',
                    'edit',
                    'update',
                    'delete',
                ],
                'route_method' => [ 
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                    "Route::post",
                    "Route::get",
                ],
                'route_addr' => [ 
                    'view',
                    'add',
                    'store',
                    'edit/{id}',
                    'update/{id}',
                    'delete/{id}',
                ],
                'route' => [ 
                    'admin_package',
                    'admin_package_create',
                    'admin_package_store',
                    'admin_package_edit',
                    'admin_package_update',
                    'admin_package_delete',
                ],
            ], /* Admin package */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_ADVERTISMENT_SECTION' => [
            0 => [
                'class' => AdminAdvertismentController::class,
                'method' => [
                    'index',
                    'update',
                ],
                'route_method' => [
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [
                    'advertisment',
                    'advertisment-update',
                ],
                'route' => [
                    'admin_advertisment',
                    'admin_advertisment_update',
                ],
            ], /* Admin Advertisment */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_BANNER_SECTION' => [
            0 => [
                'class' => AdminBannerController::class,
                'method' => [
                    'index',
                    'update',
                ],
                'route_method' => [
                    "Route::get",
                    "Route::post",
                ],
                'route_addr' => [
                    'banner',
                    'admin-banner-update'
                ],
                'route' => [
                    'admin_banner',
                    'admin_banner_update'
                ],
            ], /* Admin Banners */
        ],
        'ADMIN_PANEL_MANAGE_HOME_FRONT_SUBSCRIBERS_SECTION' => [
            0 => [
                'class' => AdminSubscriberController::class,
                'method' => [
                    'all_subscribers',
                    'send_email',
                    'send_email_submit',
                    'delete'
                ],
                'route_method' => [
                    "Route::get",
                    "Route::get",
                    "Route::post",
                    "Route::get"
                ],
                'route_addr' => [
                    'all-subscribers',
                    'subscribers-send-email',
                    'subscribers-email-submit',
                    'subscribers-delete/{id}'
                ],
                'route' => [
                    'admin_all_subscribers',
                    'admin_subscribers_send_email',
                    'admin_subscribers_send_email_submit',
                    'admin_subscriber_delete'
                ],
            ], /* Admin Subscribers */
        ],
    ];
}

function Router( $route )
{
    foreach ($route as $key => $value) {

        $index = $key;
        $class = $route[$index]['class'];
        $count = count( $route[$index]['route_addr'] );
        $link = $route[$index];
        
        for( $i = 0; $i < $count; $i++ )
            $link['route_method'][$i]( $link['route_addr'][$i], [ $class, $link['method'][$i] ] )->name( $link['route'][$i] );
    }
}

function group_route( $route_addrs, $key )
{
    $count = count($route_addrs);
    $GLOBALS['keys'] = $key;

    for ($GLOBALS['i'] = 0; $GLOBALS['i'] < $count; $GLOBALS['i']++) { 
        Route::prefix( $route_addrs[ $GLOBALS['i'] ] )->group(function(){
            $route = $GLOBALS['Routes'][ $GLOBALS['keys'][ $GLOBALS['i'] ] ];
            Router( $route );
        });
    }
}