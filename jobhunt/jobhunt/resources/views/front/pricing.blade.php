@extends('front.layout.app')

@section('seo_meta_description'){{ $page_items->meta_description }}@endsection
@section('seo_title'){{ $page_items->title }}@endsection

@section('main_content')
    
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_pricing ) }})"
    >
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $page_items->heading }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content pricing">
    <div class="container">
        <div class="row pricing">
            @foreach( $packages as $item )
                <div class="col-lg-4 mb_30">
                    <div class="card mb-5 mb-lg-0">
                        <div class="card-body">
                            <h2 class="card-title">{{ $item->package_name }}</h2>
                            <h3 class="card-price">${{ $item->package_price }}</h3>
                            <h4 class="card-day">{{ $item->package_display_time }}</h4>
                            <hr />
                            <ul class="fa-ul">
                                <li>
                                    @php
                                        $c = $item->total_allowed_jobs
                                    @endphp
                                    <span class="fa-li"
                                        ><i class="fas fa-{{ $c == 0 ? 'times' : 'check' }}"></i></span
                                    >@if( $c < 0 ) {{ 'Unlimited' }} @endif
                                     @if( $c == 0 ) {{ 'No' }} @endif
                                     @if( $c > 0 ) {{ $c }} @endif
                                     Job Post Allowed
                                </li>
                                <li>
                                    @php
                                        $c = $item->total_allowed_featured_jobs
                                    @endphp
                                    <span class="fa-li"
                                        ><i class="fas fa-{{ $c == 0 ? 'times' : 'check' }}"></i></span
                                    >@if( $c < 0 ) 'Unlimited' @endif
                                     @if( $c == 0 ) {{ 'No' }} @endif
                                     @if( $c > 0 ) {{ $c }} @endif
                                     Featured Job
                                </li>
                                <li>
                                    @php
                                        $c = $item->total_allowed_photos
                                    @endphp
                                    <span class="fa-li"
                                        ><i class="fas fa-{{ $c == 0 ? 'times' : 'check' }}"></i></span
                                    >@if( $c < 0 ) 'Unlimited' @endif
                                     @if( $c == 0 ) {{ 'No' }} @endif
                                     @if( $c > 0 ) {{ $c }} @endif 
                                     Company Photos
                                </li>
                                <li>
                                    @php
                                        $c = $item->total_allowed_videos
                                    @endphp
                                    <span class="fa-li"
                                        ><i class="fas fa-{{ $c == 0 ? 'times' : 'check' }}"></i></span
                                    >@if( $c < 0 ) 'Unlimited' @endif
                                     @if( $c == 0 ) {{ 'No' }} @endif
                                     @if( $c > 0 ) {{ $c }} @endif
                                     Company Videos
                                </li>
                            </ul>
                            <div class="buy">
                                <a href="{{ route( 'company_make_payment' ) }}" class="btn btn-primary">
                                    Choose Plan
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection