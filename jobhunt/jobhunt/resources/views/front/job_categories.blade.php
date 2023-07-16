@extends('front.layout.app')

@section('seo_meta_description'){{ $page_job_category_item->meta_description }}@endsection
@section('seo_title'){{ $page_job_category_item->title }}@endsection

@section('main_content')
        @include('front.layout.styles')
        @include('front.layout.scripts')
        <link
            href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap"
            rel="stylesheet">

    <div class="page-top" style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_job_categories ) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page_job_category_item->heading }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="job-category">
        <div class="container">
            <div class="row">
                @foreach( $job_categories as $item )
                    <div class="col-md-4">
                        <div class="item">
                            <div class="icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <h3>{{ $item->name }}</h3>
                            <p>({{ $item->r_job_count }} Open Positions)</p>
                            <a href="{{ url( 'jobs?category=' . $item->id ) }}"></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>
    @include('front.layout.scripts_bottom')
@endsection