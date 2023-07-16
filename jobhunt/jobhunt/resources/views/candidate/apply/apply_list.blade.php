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
                <h2>Applied Jobs</h2>
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
                                <th>Status</th>
                                <th>Cover Letter</th>
                                <th class="w-100">Detail</th>
                            </tr>
                            @php $i = 0; @endphp
                            @foreach( $app as $item )
                                {{ $i++ }}
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rJob->title }}</td>
                                    <td>
                                        @php
                                            $company = \App\Models\Company::where('id', $item->rJob->company_id)->first();
                                        @endphp
                                        {{ $company->company_name }}
                                    </td>
                                    <td>
                                        @php
                                            $status = '';
                                            if( $item->status == 'Applied' )
                                                $status = 'primary';
                                            if( $item->status == 'rejected' )
                                                $status = 'danger';
                                            if( $item->status == 'approved' )
                                                $status = 'success';
                                        @endphp
                                        <div class="badge bg-{{ $status }}"
                                        >{{ $item->status }}</div>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $i }}"
                                        >Cover Letter</a>
                                          <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $i }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title fs-5" id="exampleModalLabel">Modal title</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{ $item->cover_letter }}
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="{{ route( 'detail_job', $item->job_id ) }}" class="btn btn-primary btn-sm text-white"
                                        ><i class="fas fa-eye"></i></a>
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