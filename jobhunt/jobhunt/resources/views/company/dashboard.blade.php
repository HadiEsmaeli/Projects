@extends('front.layout.app')

@section('seo_meta_description')@endsection
@section('seo_title')@endsection

@section('main_content')
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Dashboard</h2>
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
            <div class="col-lg-9 col-md-12">
                <h3>Hello, {{ Auth::guard('company')->user()->person_name }} ({{ Auth::guard('company')->user()->company_name }})</h3>
                <p>See all the statistics at a glance:</p>

                <div class="row box-items">
                    <div class="col-md-4">
                        <div class="box1">
                            <h4>{{ $open_jobs }}</h4>
                            <p>Open Jobs</p>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="box2">
                            <h4>{{ $featured_jobs }}</h4>
                            <p>Featured Jobs</p>
                        </div>
                    </div>
                </div>

                <h3 class="mt-5">Recent Jobs</h3>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Job Title</th>
                                <th>Category</th>
                                <th>Location</th>
                                <th>Type</th>
                                <th>Experience</th>
                                <th>Salary</th>
                                <th>Is Featured?</th>
                                <th>Is Urgent?</th>
                            </tr>
                            @foreach ($jobs as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->rJobCategory->name }}</td>
                                    <td>{{ $item->rJobLocation->name }}</td>
                                    <td>{{ $item->rJobType->type }}</td>
                                    <td>{{ $item->rJobExperience->experience }}</td>
                                    <td>${{ $item->rJobSalary->min_range }}-${{ $item->rJobSalary->max_range }}</td>
                                    <td>
                                        @if( $item->is_featured == 1 )
                                            <span class="badge bg-success">Featured</span>
                                        @else
                                            <span class="badge bg-danger">Not Featured</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if( $item->is_urgent == 1 )
                                            <span class="badge bg-success">Urgent</span>
                                        @else
                                            <span class="badge bg-danger">Not Urgent</span>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection