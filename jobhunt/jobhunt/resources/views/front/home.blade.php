@extends('front.layout.app')

@section('seo_meta_description'){{ $home_page_data->meta_description }}@endsection
@section('seo_title'){{ $home_page_data->title }}@endsection

@section('main_content')

<div class="slider" style="background-image: url({{ asset( 'uploads/' . $home_page_data->background ) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="item">
                    <div class="text">
                        <h2>{{ $home_page_data->heading }}</h2>
                        <p>
                            {!! ltrim($home_page_data->text) !!}
                        </p>
                    </div>
                    <div class="search-section">
                        <form action="{{ route( 'job_listing' ) }}" method="GET">
                            <div class="inner">
                                <div class="row">
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <input
                                                type="text"
                                                name="title"
                                                class="form-control mb-2"
                                                placeholder="{{ $home_page_data->job_title }}"
                                            />
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="location" class="form-select select3 mb-2">
                                                <option value="">{{ $home_page_data->job_location }}</option>
                                                @foreach ($job_location_for_search_section as $item)
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>                                                    
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <div class="form-group">
                                            <select name="category" class="form-select select3 mb-2">
                                                <option value="">{{ $home_page_data->job_category }}</option>
                                                @foreach( $job_category_for_search_section as $item )
                                                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-3">
                                        <button type="submit" class="btn btn-primary">
                                            <i class="fas fa-search">
                                            </i> {{ $home_page_data->search }}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@if( $home_page_data->job_category_status == 'show' )
    <div class="job-category">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $home_page_data->job_category_heading }}</h2>
                        <p>
                            {{ $home_page_data->job_category_subheading }}
                        </p>
                    </div>
                </div>
            </div>
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
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a 
                            href="{{ route( 'job_categories' ) }}" 
                            class="btn btn-primary"
                        >See All Categories</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if( $home_page_data->why_choose_status == 'show' )
    <div class="why-choose"
        style="background-image: url({{ asset( 'uploads/whychoose/' . $home_page_data->why_choose_background ) }})">

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>Why Choose Us</h2>
                        <p>
                            Our Methods to help you build your career in
                            future
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach( $why_choose_items as $item )
                    <div class="col-md-4">
                        <div class="inner">
                            <div class="icon">
                                <i class="{{ $item->icon }}"></i>
                            </div>
                            <div class="text">
                                <h2>{{ $item->heading }}</h2>
                                <p>{{ $item->text }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@if( $home_page_data->featured_job_status == 'show' )
    <div class="job">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $home_page_data->featured_job_heading }}</h2>
                        <p>{{ $home_page_data->featured_job_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($job as $item)
                                
                    @php
                        $company_id = $item->rCompany->id;
                        $order = \App\Models\Order::where('company_id', $company_id)->where('currently_active', 1)->first();
                        if( date('Y-m-d') > $order->expire_date )
                            continue;
                    @endphp

                    <div class="col-lg-6 col-md-12">
                        <div class="item d-flex justify-content-start">
                            <div class="logo">
                                <img src="{{ asset( 'uploads/company/' . $item->rCompany->company_logo ) }}" alt="">
                            </div>
                            <div class="text">
                                <h3>
                                    <a href="{{ route( 'detail_job', $item->id ) }}">
                                        {{ $item->title }},{{ $item->rCompany->company_name }}
                                    </a>
                                </h3>
                                <div class="detail-1 d-flex justify-content-start">
                                    <div class="category">
                                        {{ $item->rJobCategory->name }}
                                    </div>
                                    <div class="location">
                                        {{ $item->rJobLocation->name }}
                                    </div>
                                </div>
                                <div class="detail-2 d-flex justify-content-start">
                                    <div class="date">
                                        {{ $item->created_at->diffForHumans() }}
                                    </div>
                                    <div class="budget">
                                        @php
                                            $str = $item->rJobSalary->range;
                                            $pos = strpos($str, '-');
                                            $realstr = '$' . substr($str, 0, $pos) . '-$' . substr($str, $pos+1);
                                            echo $realstr;
                                        @endphp
                                    </div>
                                    @if( date('Y-m-d') > $item->deadline )
                                        <div class="expired">
                                            Expired
                                        </div>
                                    @endif
                                </div>
                                <div class="special d-flex justify-content-start">
                                    @if( $item->is_featured == 1 )
                                        <div class="featured">
                                            Featured
                                        </div>
                                    @endif
                                    <div class="type">
                                        {{ $item->rJobType->type }}
                                    </div>
                                    @if( $item->is_urgent == 1 )
                                        <div class="urgent">
                                            Urgent
                                        </div>
                                    @endif
                                </div>
                                <div class="bookmark">

                                    @if( Auth::guard('candidate')->check() )
                                        @php
                                            $count = \App\Models\CandidateBookmark::where('candidate_id', Auth::guard('candidate')->user()->id)
                                                ->where('job_id', $item->id)->count();
                                            if( $count > 0 )
                                                $status_bookmark = 'active';
                                            else
                                                $status_bookmark = '';
                                        @endphp
                                    @else
                                        @php $status_bookmark = '' @endphp
                                    @endif
                                    
                                    <a href="{{ route( 'candidate_bookmark_add', $item->id ) }}">
                                        <i 
                                            class="fas fa-bookmark {{ $status_bookmark }}">
                                        </i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="all">
                        <a href="{{ route( 'job_listing' ) }}" class="btn btn-primary"
                        >See All Jobs</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

@if( $home_page_data->testimonial_status == 'show' )
    <div class="testimonial"
        style="background-image: url({{ asset( 'uploads/' . $home_page_data->testimonial_background ) }})">

        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="main-header">{{ $home_page_data->heading }}</h2>
                </div>
            </div>
            <div class="row">
                    <div class="col-12">
                        <div class="testimonial-carousel owl-carousel">
                            @foreach( $testimonial as $item )
                                <div class="item">
                                    <div class="photo">
                                        <img src="{{ asset( 'uploads/testimonials/' . $item->photo ) }}" alt="" />
                                    </div>
                                    <div class="text">
                                        <h4>{{ $item->name }}</h4>
                                        <p>{{ $item->designation }}</p>
                                    </div>
                                    <div class="description">
                                        <p>{{ $item->comment }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
            </div>
        </div>
    </div>
@endif

@if( $home_page_data->blog_status == 'show' )
    <div class="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="heading">
                        <h2>{{ $home_page_data->blog_heading }}</h2>
                        <p>{{ $home_page_data->blog_subheading }}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach( $post as $item )
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset( 'uploads/posts/' . $item->photo ) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route( 'post', $item->slug ) }}">{{ $item->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>{{ $item->short_description }}</p>
                                </div>
                                <div class="button">
                                    <a href="{{ route( 'post', $item->slug ) }}" class="btn btn-primary">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endif

@endsection