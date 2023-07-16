<?php

use App\Http\Controllers\Company\ {
    CompanyController,
};

use App\Http\Controllers\Candidate\ {
    CandidateController,
};

use App\Http\Controllers\Admin\UserAdmin\ {
    AdminProfileController,
};

global $i, $keys, $Routes;
$Routes = route_list();

/* Front */
Route::prefix('/')->group(function(){
    $route = $GLOBALS['Routes']['FRONT_ROUTES'];    
    Router( $route );

    //prefix's
    $route_addrs = [
        'candidate/',
        'company/',
    ];

    $key = [
        'CANDIDATE',
        'COMPANY',
    ];

    group_route( $route_addrs, $key );
});

Route::middleware(['candidate:candidate'])->group(function(){
    Route::prefix('candidate/')->group(function(){
        Route::get('dashboard', [CandidateController::class, 'dashboard'])->name('candidate_dashboard');
        Route::get('logout', [CandidateController::class, 'logout'])->name('candidate_logout');    

        $route = $GLOBALS['Routes']['CANDIDATE_WHEN_LOGIN'];
        Router( $route );
    });
});

Route::middleware(['company:company'])->group(function(){
    Route::prefix('company/')->group(function(){
        $route = $GLOBALS['Routes']['COMPANY_WHEN_LOGIN'];
        Router( $route );

        /* Company Payment Paypal */
        Route::post('paypal/payment', [CompanyController::class, 'paypal'])->name('paypal');
        Route::get('paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
        Route::get('paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');

        /* Company Payment Stripe */
        Route::post('stripe/payment', [CompanyController::class, 'stripe'])->name('stripe');
        Route::get('stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
        Route::get('stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');
    });
});

/* Admin login */
Route::prefix('admin/')->group(function(){
    $route = $GLOBALS['Routes']['ADMIN_LOGIN'];
    Router( $route );
});

Route::middleware(['admin:admin'])->group(function(){
    Route::prefix('admin/')->group(function(){
        $route = $GLOBALS['Routes']['ADMIN_PANEL_FRONT_PAGES'];
        Router( $route );
        Route::post('edit-profile-submit', [ AdminProfileController::class, 'profile_submit' ])->name('admin_profile_submit')->middleware('admin:admin');  
    });

    Route::prefix('admin/')->group(function(){

        //prefix's
        $route_addrs = [ 
            'job-category/', 
            'job-location/',
            'job-type/',
            'experience/',
            'salary/',
            'company-location/',
            'company-industry/',
            'company-found/',
            'company-size/',
            'why-choose/',
            'testimonial/',
            'post/',
            'faq/',
            'package/',
            'advertisment/',
            'banner/',
            'subscriber/',
            'company/',
            'candidate/',
        ];

        $key = [ 
            'ADMIN_PANEL_MANAGE_JOB_CATEGORY_SECTION',
            'ADMIN_PANEL_MANAGE_JOB_LOCATION_SECTION',
            'ADMIN_PANEL_MANAGE_JOB_TYPE_SECTION',
            'ADMIN_PANEL_MANAGE_EXPERIENCE_SECTION',
            'ADMIN_PANEL_MANAGE_SALARY_RANGE_SECTION',
            'ADMIN_PANEL_MANAGE_COMPANY_LOCATION_SECTION',
            'ADMIN_PANEL_MANAGE_COMPANY_INDUSTRY_SECTION',
            'ADMIN_PANEL_MANAGE_COMPANY_FOUND_SECTION',
            'ADMIN_PANEL_MANAGE_COMPANY_SIZE_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_WHY_CHOOSE_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_TESTIMONIAL_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_POST_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_FAQ_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_PACKAGES_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_ADVERTISMENT_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_BANNER_SECTION',
            'ADMIN_PANEL_MANAGE_HOME_FRONT_SUBSCRIBERS_SECTION',
            'ADMIN_PANEL_MANAGE_COMPANY_SECTION',
            'ADMIN_PANEL_MANAGE_CANDIDATE_SECTION',
        ];

        group_route( $route_addrs, $key );
    });
});