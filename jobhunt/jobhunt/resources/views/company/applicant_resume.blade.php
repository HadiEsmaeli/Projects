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
                <h2>Resume of "{{ $candidate->name }}"</h2>
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
                <h4 class="resume">Basic Profile</h4>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="w-200">Photo:</th>
                                <td>
                                    <img src="{{ asset( 'uploads/candidate/profile_photos/' . $candidate->photo ) }}" alt="" class="w-100">
                                </td>
                            </tr>
                            <tr>
                                <th>Name:</th>
                                <td>{{ $candidate->name }}</td>
                            </tr>
                            <tr>
                                <th>Designation:</th>
                                <td>{{ $candidate->designation }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $candidate->email }}</td>
                            </tr>
                            <tr>
                                <th>Phone:</th>
                                <td>{{ $candidate->phone }}</td>
                            </tr>
                            <tr>
                                <th>Country:</th>
                                <td>{{ $candidate->country }}</td>
                            </tr>
                            <tr>
                                <th>Address:</th>
                                <td>{{ $candidate->address }}</td>
                            </tr>
                            <tr>
                                <th>State:</th>
                                <td>{{ $candidate->stat }}</td>
                            </tr>
                            <tr>
                                <th>City:</th>
                                <td>{{ $candidate->city }}</td>
                            </tr>
                            <tr>
                                <th>Zip Code:</th>
                                <td>{{ $candidate->zip_code }}</td>
                            </tr>
                            <tr>
                                <th>Gender:</th>
                                <td>
                                    @if( $candidate->gender == 1 )
                                        {{ 'Male' }}
                                    @else
                                        {{ 'Female' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Marital Status:</th>
                                <td>
                                    @if( $candidate->marital_status == 1 )
                                        {{ 'Married' }}
                                    @else
                                        {{ 'Unmarried' }}
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th>Date of Birth:</th>
                                <td>{{ $candidate->date_of_birth }}</td>
                            </tr>
                            <tr>
                                <th>Website:</th>
                                <td>{{ $candidate->website }}</td>
                            </tr>
                            <tr>
                                <th>Biography:</th>
                                <td>
                                    <p>{!! nl2br($candidate->biography) !!}</p>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <h4 class="resume mt-5">Education</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Education Level</th>
                                <th>Institute</th>
                                <th>Degree</th>
                                <th>Passing Year</th>
                            </tr>
                            @foreach( $candidate_education as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->level }}</td>
                                    <td>{{ $item->institute }}</td>
                                    <td>{{ $item->degree }}</td>
                                    <td>{{ $item->passing_year }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="resume mt-5">Skills</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Skill Name</th>
                                <th>Percentage</th>
                            </tr>
                            @foreach( $candidate_skill as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->skill }}</td>
                                    <td>{{ $item->percentage }}%</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="resume mt-5">Experience</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Company</th>
                                <th>Designation</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                            </tr>
                            @foreach( $candidate_experience as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->company }}</td>
                                    <td>{{ $item->designation }}</td>
                                    <td>{{ $item->start_date }}</td>
                                    <td>{{ $item->end_date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="resume mt-5">Awards</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th class="w-100">Date</th>
                            </tr>
                            @foreach( $candidate_award as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->title }}</td>
                                    <td>{{ $item->description }}</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                <h4 class="resume mt-5">Resume</h4>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>SL</th>
                                <th>Name</th>
                                <th>File</th>
                            </tr>
                            @foreach( $candidate_resume as $item )
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>
                                        <a href="{{ asset( 'uploads/candidate/resume/' . $item->file ) }}" target="_blank">{{ $item->file }}</a>
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