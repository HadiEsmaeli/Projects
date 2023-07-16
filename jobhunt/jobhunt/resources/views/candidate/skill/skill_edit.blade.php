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
                <h2>Edit Skills</h2>
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
                    href="{{ route( 'candidate_skill' ) }}" 
                    class="btn btn-primary btn-sm mb-2"
                ><i class="fas fa-plus"></i> See All</a>

                <form action="{{ route( 'candidate_skill_update', $skill->id ) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="">Skill *</label>
                            <div class="form-group">
                                <input 
                                    type="text"
                                    name="skill" 
                                    class="form-control"
                                    value="{{ $skill->skill }}"
                                >
                            </div>
                        </div>
                        <div class="col-md-12 mb-3">
                            <label for="">Percentage *</label>
                            <div class="form-group">
                                <input 
                                    type="text"
                                    name="percentage" 
                                    class="form-control"
                                    value="{{ $skill->percentage }}"
                                >
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