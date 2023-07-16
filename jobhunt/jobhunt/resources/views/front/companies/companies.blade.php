@extends('front.layout.app')

@section('seo_meta_description'){{ $global_page_other_data->company_listing_page_heading }}@endsection
@section('seo_title'){{ $global_page_other_data->company_listing_page_title }}@endsection

@section('main_content')
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_listing ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_other_data->company_listing_page_meta_description }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="job-result">
    <div class="container">
        <div class="row">
            @include('front.companies.sidebar')
            <div class="col-lg-9 col-md-12">
                <div class="job">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-result-header">
                                    <i class="fas fa-search"></i> Search
                                    Result for Company Listing
                                </div>
                            </div>
                            @if( !$company->count() )
                                <span class="text text-danger">no result fount</span>
                            @else
                                @foreach ($company as $item)
                                
                                    @php
                                        $order = \App\Models\Order::where('company_id', $item->id)->where('currently_active', 1)->first();
                                        if( date('Y-m-d') > $order->expire_date )
                                            continue;
                                    @endphp

                                    <div class="col-md-12">
                                        <div class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="{{ asset( 'uploads/company/' . $item->company_logo ) }}" alt="">
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{ route( 'company_detal', $item->id ) }}">{{ $item->company_name }}</a>
                                                </h3>
                                                <div class="detail-1 d-flex justify-content-start">
                                                    <div class="category">
                                                        {{ $item->rCompanyIndustry->industry_name }}
                                                    </div>
                                                    <div class="location">
                                                        {{ $item->rCompanyLocation->location }}
                                                    </div>
                                                </div>
                                                <div class="detail-2 d-flex justify-content-start">{!! substr($item->description, 0, 120) !!}...</div>
                                                <div class="open-position">
                                                    <span class="badge bg-primary">{{ $item->r_company_count }} Open Positions</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                {{-- Pagination --}}
                                <div class="col-md-12">
                                    {{ $company->appends($_GET)->links() }}
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection