@extends('front.layout.app')

@section('main_content')
<div
    class="page-top"
    style="background-image: url('uploads/banner.jpg')"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Job Listing</h2>
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
                                            >Software Engineer, Google</a>
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
    </div>
</div>
@endsection