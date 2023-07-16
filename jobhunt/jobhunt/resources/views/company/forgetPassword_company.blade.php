@extends('front.layout.app')

@section('seo_meta_description'){{ $other_page_data->forget_password_page_meta_description }}@endsection
@section('seo_title'){{ $other_page_data->forget_password_page_title }}@endsection

@section('main_content')

<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $other_page_data->forget_password_page_heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="login-form">
                <form action="{{ route( 'forgetpassword_company_submit' ) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="" class="form-label">Email Address</label>
                        <input 
                            type="email" 
                            class="form-control"
                            name="email"
                        />
                    </div>
                    <div class="mb-3">
                        <button
                            type="submit"
                            class="btn btn-primary bg-website"
                        >Submit</button>
                        <a 
                            href="{{ route( 'login' ) }}"
                            class="primary-color"
                        >Back to Login Page</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

@endsection