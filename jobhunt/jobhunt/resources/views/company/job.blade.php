@extends('front.layout.app')

@section('seo_meta_description')@endsection
@section('seo_title')@endsection

@section('main_content')
<div
    class="page-top page-top-job-single"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 job job-single">
                <div class="item d-flex justify-content-start">
                    <div class="logo">
                        <img src="{{ asset( 'uploads/logo1.png' ) }}" alt="" />
                    </div>
                    <div class="text">
                        <h3>{{ $job->title }}</h3>
                        <div
                            class="detail-1 d-flex justify-content-start"
                        >
                            <div class="category">{{ $job->rJobCategory->name }}</div>
                            <div class="location">{{ $job->rJobLocation->name }}</div>
                        </div>
                        <div
                            class="detail-2 d-flex justify-content-start"
                        >
                            <div class="date">
                                @php
                                    $diff = date_diff($job->created_at, date("Y-m-d h:i:s"));
                                    echo $diff->format("%R%a days ago");
                                @endphp
                            </div>
                            <div class="budget">${{ $job->rJobSalary->min_range }}-${{ $job->rJobSalary->max_range }}</div>
                            <div class="expired">
                                @php
                                    if( $job->created_at < date('Y-m-d') )
                                        echo 'Expired';
                                @endphp
                            </div>
                        </div>
                        <div
                            class="special d-flex justify-content-start"
                        >
                            <div class="featured">{{ $job->is_featured == 1 ? 'Featured' : 'No Featured' }}</div>
                            <div class="type">{{ $job->rJobType->type }}</div>
                            <div class="urgent">{{ $job->js_urgent == 1 ? 'Urgent' : 'No Urgent' }}</div>
                        </div>
                        <div class="apply">
                            <a href="apply.html" class="btn btn-primary"
                                >Apply Now</a
                            >
                            <a
                                href="apply.html"
                                class="btn btn-primary save-job"
                                >Bookmark</a
                            >
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('company.sidebar')
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="col-lg-8 col-md-12">
                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Description
                        </h2>
                        <p>{!! $job->description !!}</p>
                    </div>
                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Job Responsibilities
                        </h2>
                        {!! $job->responsibility !!}
                    </div>
                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Skills and Abilities
                        </h2>
                        {!! $job->skill !!}
                    </div>

                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Educational Qualification
                        </h2>
                        {!! $job->education !!}
                    </div>

                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Benefits
                        </h2>
                        {!! $job->benifit !!}
                    </div>

                    <div class="left-item">
                        <div class="apply">
                            <a href="apply.html" class="btn btn-primary"
                            >Apply Now</a>
                        </div>
                    </div>

                    <div class="left-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Related Jobs
                        </h2>
                        <div class="job related-job pt-0 pb-0">
                            <div class="container">
                                <div class="row">

                                    <div class="col-md-12">
                                        <div
                                            class="item d-flex justify-content-start"
                                        >
                                            <div class="logo">
                                                <img
                                                    src="uploads/logo1.png"
                                                    alt=""
                                                />
                                            </div>
                                            <div class="text">
                                                <h3>
                                                    <a href="job.html"
                                                        >Software Engineer,
                                                        Google</a
                                                    >
                                                </h3>
                                                <div
                                                    class="detail-1 d-flex justify-content-start"
                                                >
                                                    <div class="category">
                                                        Web Development
                                                    </div>
                                                    <div class="location">
                                                        United States
                                                    </div>
                                                </div>
                                                <div
                                                    class="detail-2 d-flex justify-content-start"
                                                >
                                                    <div class="date">
                                                        3 days ago
                                                    </div>
                                                    <div class="budget">
                                                        $3000-$3500
                                                    </div>
                                                    <div class="expired">
                                                        Expired
                                                    </div>
                                                </div>
                                                <div
                                                    class="special d-flex justify-content-start"
                                                >
                                                    <div class="featured">
                                                        Featured
                                                    </div>
                                                    <div class="type">
                                                        Full Time
                                                    </div>
                                                    <div class="urgent">
                                                        Urgent
                                                    </div>
                                                </div>
                                                <div class="bookmark">
                                                    <a href=""
                                                        ><i
                                                            class="fas fa-bookmark active"
                                                        ></i
                                                    ></a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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
                                        <td>{{ $job->created_at->format('F') }} {{ $job->created_at->format('d') }}, {{ $job->created_at->format('Y') }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Deadline:</b></td>
                                        <td>{{ $job->deadline->format('F') }}  {{ $job->deadline->format('d') }} , {{ $job->deadline->format('Y') }} </td>
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
                                        <td>${{ $job->rJobSalary->min_range }}-${{ $job->rJobSalary->max_range }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Experience:</b>
                                        </td>
                                        <td>{{ $job->rJobExperience->experience }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Type:</b></td>
                                        <td>{{ $job->rJobType->type }}</td>
                                    </tr>
                                    <tr>
                                        <td><b>Gender:</b></td>
                                        <td>{{ $job->job_gender_id == 1 ? 'Male' : 'Female' }}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Enquery Form
                        </h2>
                        <div class="enquery-form">
                            <form action="" method="POST">
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        class="form-control"
                                        placeholder="Full Name"
                                    />
                                </div>
                                <div class="mb-3">
                                    <input
                                        type="email"
                                        name="email"
                                        class="form-control"
                                        placeholder="Email Address"
                                    />
                                </div>
                                <div class="mb-3">
                                    <input
                                        type="text"
                                        name="phone"
                                        class="form-control"
                                        placeholder="Phone Number"
                                    />
                                </div>
                                <div class="mb-3">
                                    <textarea
                                        class="form-control h-150"
                                        name="message"
                                        rows="3"
                                        placeholder="Message"
                                    ></textarea>
                                </div>
                                <div class="mb-3">
                                    <button
                                        type="submit"
                                        class="btn btn-primary"
                                    >Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="right-item">
                        <h2><i class="fas fa-file-invoice"></i>
                            Location Map
                        </h2>
                        <div class="location-map">
                            {!! $job->map_code !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection