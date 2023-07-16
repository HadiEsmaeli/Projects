@extends('front.layout.app')

@section('seo_meta_description'){{ $global_page_other_data->job_listing_page_heading }}@endsection
@section('seo_title'){{ $global_page_other_data->job_listing_page_title }}@endsection

@section('main_content')
<div
    class="page-top"
    style="background-image: url('uploads/banner.jpg')"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>{{ $global_page_other_data->job_listing_page_meta_description }}</h2>
            </div>
        </div>
    </div>
</div>

<div class="job-result">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('front.findjob.sidebar')
            </div>
            <div class="col-md-9">
                <div class="job">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="search-result-header">
                                    <i class="fas fa-search"></i> Search Result for Job Listing
                                </div>
                            </div>
                            @if( !$jobs->count() )
                                <span class="text text-danger">not result found.</span>
                            @else
                                @foreach ($jobs as $item)
                                
                                    @php
                                        $company_id = $item->rCompany->id;
                                        $order = \App\Models\Order::where('company_id', $company_id)->where('currently_active', 1)->first();
                                        if( date('Y-m-d') > $order->expire_date )
                                            continue;
                                    @endphp
                                
                                    <div class="col-md-12">
                                        <div class="item d-flex justify-content-start">
                                            <div class="logo">
                                                <img src="{{ asset( 'uploads/company/' . $item->rCompany->company_logo ) }}" alt="">
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="{{ route( 'detail_job', $item->id ) }}">
                                                        {{ $item->title }}, {{ $item->rCompany->company_name }}
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
                                                        {{-- ${{ $item->rJobSalary->range }} --}}
                                                    </div>
                                                    @if( date( 'Y-m-d' ) > $item->deadline )
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
                                                        <i class="fas fa-bookmark {{ $status_bookmark }}"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="col-md-12">
                                    {{ $jobs->appends($_GET)->links() }}
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