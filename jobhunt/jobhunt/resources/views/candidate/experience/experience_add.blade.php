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
                <h2>Add Experience</h2>
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
                <a 
                    href="{{ route( 'candidate_experience' ) }}" 
                    class="btn btn-primary btn-sm mb-2"
                ><i class="fas fa-plus"></i> See All</a>

                <form action="{{ route( 'candidate_experience_submit' ) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Company *</label>
                            <div class="form-group">
                                <input type="text" name="company" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Designation *</label>
                            <div class="form-group">
                                <input type="text" name="designation" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">start_date *</label>
                            <div class="form-group">
                                <input type="text" name="start_date" class="datepicker form-control">
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">end_date *</label>
                            <div class="form-group">
                                <input type="text" name="end_date" class="datepicker form-control">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <input type="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection