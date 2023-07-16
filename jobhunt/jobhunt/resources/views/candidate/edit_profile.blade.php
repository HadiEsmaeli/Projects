@extends('front.layout.app')

@section('main_content')

<div
    class="page-top"
    style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_candidate_panel ) }})">
    <div class="bg"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Edit Profile</h2>
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
                <form action="{{ route( 'candidate_profile_update' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Existing Photo</label>
                            <div class="form-group">
                                <img
                                    src="{{ asset( 'uploads/candidate/profile_photos/' . $candidate->photo ) }}"
                                    alt=""
                                    class="user-photo"
                                />
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Change Photo</label>
                            <div class="form-group">
                                <input type="file" name="photo" />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Name *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="name"
                                    class="form-control"
                                    value="{{ $candidate->name }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Designation</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="designation"
                                    class="form-control"
                                    value="{{ $candidate->designation }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Biography</label>
                            <textarea
                                name="biography"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $candidate->biography }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Email *</label>
                            <div class="form-group">
                                <input
                                    type="email"
                                    name="email"
                                    class="form-control"
                                    value="{{ $candidate->email }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Username *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="username"
                                    class="form-control"
                                    value="{{ $candidate->username }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Phone *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="phone"
                                    class="form-control"
                                    value="{{ $candidate->phone }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Country</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="country"
                                    class="form-control"
                                    value="{{ $candidate->country }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Address</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="address"
                                    class="form-control"
                                    value="{{ $candidate->address }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">State</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="stat"
                                    class="form-control"
                                    value="{{ $candidate->stat }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">City *</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="city"
                                    class="form-control"
                                    value="{{ $candidate->city }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Zip Code</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="zip_code"
                                    class="form-control"
                                    value="{{ $candidate->zip_code }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Gender</label>
                            <div class="form-group">
                                <select
                                    name="sex"
                                    class="form-control select2"
                                >
                                    <option value="1" @if( $candidate->gender == 1 ) selected @endif>Male</option>
                                    <option value="2" @if( $candidate->gender == 2 ) selected @endif>Female</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Marital Status</label>
                            <div class="form-group">
                                <select
                                    name="marital_status"
                                    class="form-control select2"
                                >
                                    <option value="1" @if( $candidate->marital_status == 1 ) selected @endif>Married</option>
                                    <option value="2" @if( $candidate->marital_status == 2 ) selected @endif>Unmarried</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Date of Birth</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="date_of_birth"
                                    class="form-control datepicker"
                                    value="{{ $candidate->date_of_birth }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="">Website</label>
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="website"
                                    class="form-control"
                                    value="{{ $candidate->website }}"
                                />
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input
                                    type="submit"
                                    class="btn btn-primary"
                                    value="Update"
                                />
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>    
@endsection