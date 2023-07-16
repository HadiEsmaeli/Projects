@extends('front.layout.app')

@section('seo_meta_description'){{ $page_contact_data->meta_description }}@endsection
@section('seo_title'){{ $page_contact_data->title }}@endsection

@section('main_content')
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_contact ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_contact_data->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="contact-form">
                    <form action="{{ route( 'contact_store' ) }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="" class="form-label">Name</label>
                            <input name="name" value="{{ old('name') }}" type="text" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Email Address</label>
                            <input name="email" value="{{ old('email') }}" type="email" class="form-control" />
                        </div>
                        <div class="mb-3">
                            <label for="" class="form-label">Message</label>
                            <textarea
                                name="msg"
                                class="form-control"
                                rows="3"
                            >{{ old( 'msg' ) }}</textarea>
                        </div>
                        <div class="mb-3">
                            <button
                                type="submit"
                                class="btn btn-primary bg-website"
                            >Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="map">{!! $page_contact_data->map_code !!}</div>
            </div>
        </div>
    </div>
</div>

@endsection