@extends('front.layout.app')

@section('main_content')

<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Reset password</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-4 col-lg-5 col-md-6 col-sm-12">
            <div class="login-form">
                <form action="{{ route( 'resetpassword_company_submit' ) }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <input value="{{ $token }}" type="hidden" class="form-control" name="token"/>
                    </div>
                    <div class="mb-3">
                        <input value="{{ $email }}" type="hidden" class="form-control" name="email"/>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Password</label>
                        <input 
                            type="password" 
                            class="form-control"
                            name="password"
                        />
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Confirm Password</label>
                        <input 
                            type="password" 
                            class="form-control"
                            name="retype_password"
                        />
                    </div>
                    <div class="mb-3">
                        <button
                            type="submit"
                            class="btn btn-primary bg-website"
                        >Reset</button>
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