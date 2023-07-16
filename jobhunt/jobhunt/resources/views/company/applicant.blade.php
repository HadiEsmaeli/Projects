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
                <h2>Applicants of job: {{ $job->title }}</h2>
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
                <h4>Applicants of this job:</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>Mobile</th>
                                <th>Current Status</th>
                                <th>Action</th>
                                <th>Detail</th>
                                <th>CV</th>
                            </tr>
                            @php $i = 0; @endphp
                            @foreach ($applicant as $item)
                                @php $i++; @endphp
                                <tr> 
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->rCandidate->name }}</td>
                                    <td>{{ $item->rCandidate->email }}</td>
                                    <td>{{ $item->rCandidate->phone }}</td>
                                    <td>
                                        {{ $status = '' }}
                                        @if( $item->status == 'Applied' ) @php $status = 'primary'  @endphp @endif
                                        @if( $item->status == 'approved' ) @php $status = 'success' @endphp @endif
                                        @if( $item->status == 'rejected' ) @php $status = 'danger'  @endphp @endif
                                        <span class="badge bg-{{ $status }}">
                                            {{ $item->status }}
                                        </span>
                                    </td>
                                    <td>
                                        <form action="{{ route( 'company_application_status' ) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="job_id" value="{{ $job->id }}">
                                            <input type="hidden" name="candidate_id" value="{{ $item->candidate_id }}">
                                            <select name="status" class="form-control select2" onchange="this.form.submit()">
                                                <option value="">Select</option>
                                                <option value="approved">Approve</option>
                                                <option value="rejected">Reject</option>
                                            </select>
                                        </form>
                                    </td>
                                    <td>
                                        <a 
                                            href="{{ route( 'company_applicant_detail', $item->candidate_id ) }}"
                                            class="badge bg-primary text-white"
                                        >Detail</a>
                                    </td>
                                    <td>
                                        <a href="" class="btn btn-warning btn-sm" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $i }}"
                                        >CV</a>

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
                                                </div>
                                            </div>
                                        </div>

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