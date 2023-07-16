@extends('front.layout.app')

@section('main_content')
<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_company_panel ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Orders</h2>
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
                                <th>Action</th>
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
                                        <a
                                            href="{{ route( 'company_job_edit', $item->id ) }}"
                                            class="btn btn-warning btn-sm text-white"
                                        ><i class="fas fa-edit"></i></a>
                                        <a
                                            href="{{ route( 'company_job_delete', $item->id ) }}"
                                            class="btn btn-danger btn-sm"
                                            onClick="return confirm('Are you sure?');"
                                        ><i class="fas fa-trash-alt"></i></a>
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