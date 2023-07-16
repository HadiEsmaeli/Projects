@extends('front.layout.app')

@section('seo_meta_description'){{ $privacy->meta_description }}@endsection
@section('seo_title'){{ $privacy->title }}@endsection

@section('main_content')

    <body>

        <div class="page-top" style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_privacy ) }})">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $privacy->heading }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>{!! $privacy->content !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('front.layout.scripts_bottom')


@endsection