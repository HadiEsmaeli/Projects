@extends('front.layout.app')

@section('seo_meta_description'){{ $job->title }} {{ ',' }} {{ $job->rCompany->company_name }}@endsection
@section('seo_title'){{ $job->title , $job->rCompany->company_name }}@endsection

@section('main_content')
<div
    class="page-top page-top-job-single"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_job_detail ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset( 'uploads/company/' . $job->rCompany->company_logo ) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $job->title }}, {{ $job->rCompany->company_name }}</h3>
                        <div class="detail-1 d-flex justify-content-start">
                            <div class="category">
                                {{ $job->rJobCategory->name }}
                            </div>
                            <div class="location">
                                {{ $job->rJobLocation->name }}
                            </div>
                        </div>
                        <div
                            class="detail-2 d-flex justify-content-start"
                        >
                            <div class="date">
                                {{ $job->created_at->diffForHumans() }}
                            </div>
                            <div class="budget">
                                @php
                                    $str = $job->rJobSalary->range;
                                    $pos = strpos($str, '-');
                                    $realstr = '$' . substr($str, 0, $pos) . '-$' . substr($str, $pos+1);
                                    echo $realstr;
                                @endphp
                            </div>
                            @if( date('Y-m-d') > $job->deadline )
                                <div class="expired">Expired</div>
                            @endif
                        </div>
                        <div class="special d-flex justify-content-start">
                            @if( $job->is_featured == 1 )
                                <div class="featured">
                                        Featured
                                </div>
                            @endif
                            <div class="type">
                                {{ $job->rJobType->type }}
                            </div>
                            @if( $job->is_urgent == 1 )
                                <div class="urgent">Urgent</div>
                            @endif
                        </div>
                        @if( !Auth::guard('company')->check() )
                            <div class="apply">
                                @if( date('Y-m-d') <= $job->deadline )
                                    <a href="{{ route( 'candidate_apply', $job->id ) }}" class="btn btn-primary">
                                        @if( $apply == 1 )
                                            {{ 'Applied' }}
                                        @else
                                            {{ 'Apply Now' }}
                                        @endif
                                    </a>
                                @endif

                                @php
                                    $mark = \App\Models\CandidateBookmark::where('job_id', $job->id)->count();
                                @endphp

                                @if( $mark == 0 )
                                    <a href="{{ route( 'candidate_bookmark_add', $job->id ) }}" class="btn btn-primary save-job">
                                        Bookmark
                                    </a>
                                @endif
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="job-result pt-50 pb-50">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-12">
                <div class="left-item">
                    <h2><i class="fas fa-file-invoice"></i>
                        Description
                    </h2>
                    <p>{!!  $job->description !!}</p>
                </div>
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Job Responsibilities
                    </h2>
                    {!! $job->responsibility !!}
                </div>
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Skills and Abilities
                    </h2>
                    {!! $job->skill !!}
                </div>

                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Educational Qualification
                    </h2>
                    {!! $job->education !!}
                </div>

                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Benefits
                    </h2>
                    {!! $job->benifit !!}
                </div>

                @if( !Auth::guard('company')->check() )
                    @if( date('Y-m-d') <= $job->deadline )
                        <div class="left-item">
                            <div class="apply">
                                <a href="{{ route( 'candidate_apply', $job->id ) }}" class="btn btn-primary">
                                    @if( $apply == 1 )
                                        {{ 'Applied' }}
                                    @else
                                        {{ 'Apply Now' }}
                                    @endif
                                </a>
                            </div>
                        </div>
                    @endif
                @endif
                <div class="left-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Related Jobs
                    </h2>
                    <div class="job related-job pt-0 pb-0">
                        <div class="container">
                            <div class="row">
                                @php $i = 0 @endphp
                                @foreach ($related_jobs as $item)
                                    @php $i++ @endphp
                                    <div class="col-md-12">
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
                                                        <i class="fas fa-bookmark {{ $status_bookmark }}"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                @if( $i == 0 )
                                    <span class="text text-danger">no related job.</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-md-12">

                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Job Summary
                    </h2>
                    <div class="summary">
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <tr>
                                    <td>
                                        <b>Published On:</b>
                                    </td>
                                    <td>{{ $job->created_at->format('F d, Y') }}</td>
                                </tr>
                                <tr>
                                    <td><b>Deadline:</b></td>
                                    <td>
                                        @php $d = DateTime::createFromFormat('Y-m-d h:i:s', $job->deadline) @endphp

                                        {{ $d->format('F d, Y') }}
                                    </td>
                                </tr>
                                <tr>
                                    <td><b>Vacancy:</b></td>
                                    <td>{{ $job->vacancy }}</td>
                                </tr>
                                <tr>
                                    <td><b>Category:</b></td>
                                    <td>{{ $job->rJobCategory->name }}</td>
                                </tr>
                                <tr>
                                    <td><b>Location:</b></td>
                                    <td>{{ $job->rJobLocation->name }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Salary Range:</b>
                                    </td>
                                    <td>
                                        @php
                                            $str = $job->rJobSalary->range;
                                            $pos = strpos($str, '-');
                                            $realstr = '$' . substr($str, 0, $pos) . '-$' . substr($str, $pos+1);
                                            echo $realstr;
                                        @endphp
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <b>Experience:</b>
                                    </td>
                                    <td>{{ $job->rJobExperience->experience }}</td>
                                </tr>
                                <tr>
                                    <td><b>Type:</b></td>
                                    <td>{{ $job->rJobType->type }}</td>
                                </tr>
                                <tr>
                                    <td><b>Gender:</b></td>
                                    <td>
                                        @if( $job->job_gender_id == 1 )
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Enquery form --}}
                <div class="right-item">
                    <h2>
                        <i class="fas fa-file-invoice"></i>
                        Enquery Form
                    </h2>
                    <div class="enquery-form">
                        <form action="{{ route( 'job_enquery', $job->company_id ) }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <input type="hidden" name="job_title" value="{{ $job->title }}">
                                <input value="{{ old( 'name' ) }}" type="text" name="name" class="form-control" placeholder="Full Name">
                            </div>
                            <div class="mb-3">
                                <input value="{{ old( 'email' ) }}" type="email" name="email" class="form-control" placeholder="Email Address" >
                            </div>
                            <div class="mb-3">
                                <input value="{{ old( 'phone' ) }}" type="text" name="phone" class="form-control" placeholder="Phone Number" >
                            </div>
                            <div class="mb-3">
                                <textarea name="message" class="form-control h-150" rows="3" 
                                    placeholder="Message"
                                >{{ old( 'message' ) }}</textarea>
                            </div>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                {{-- Location Map --}}
                @if( $job->map_code != null )
                    <div class="right-item">
                        <h2>
                            <i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        <div class="location-map">
                            {!! $job->map_code !!}
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection