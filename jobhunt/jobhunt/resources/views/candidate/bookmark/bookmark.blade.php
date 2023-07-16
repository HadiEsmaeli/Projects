@extends('front.layout.app')

@section('main_content')

<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_candidate_panel ) }})"
>
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Bookmark List</h2>
            </div>
        </div>
    </div>
</div>

<div class="page-content user-panel">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-12">
                <div class="card">
                    @include('candidate.sidebar')
                </div>
            </div>
            <div class="col-lg-9 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Job Title</th>
                                <th>Company</th>
                                <th class="w-100">Detail</th>
                            </tr>
                            @foreach( $bookmark as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rJob->title }}</td>
                                    <td>
                                        @php
                                            $company = \App\Models\Company::where('id', $item->rJob->company_id)->first();
                                            echo $company->company_name;
                                        @endphp
                                    </td>
                                    <td>
                                        <a
                                            href="{{ route( 'detail_job', $item->rJob->id ) }}"
                                            class="btn btn-primary btn-sm text-white"
                                        ><i class="fas fa-eye"></i></a>
                                        <a
                                        href="{{ route( 'candidate_bookmark_add', $item->job_id ) }}"
                                        class="btn btn-danger btn-sm"
                                        onClick="return confirm('Are you sure?');"
                                        ><i class="fas fa-trash-alt"></i
                                    ></a>
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