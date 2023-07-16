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
                <h2>Edit Job</h2>
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
                <form action="{{ route( 'company_job_update', $job->id ) }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Title *</label>
                            <input 
                                type="text" 
                                name="title" 
                                class="form-control" 
                                value="{{ $job->title }}"
                            />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description *</label>
                        <textarea
                            name="description"
                            class="form-control editor"
                            cols="30"
                            rows="10"
                        >{{ $job->description }}</textarea>
                    </div>
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Responsibilities</label>
                            <textarea
                                name="responsibilities"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $job->responsibility }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Skills and Abilities</label>
                            <textarea
                                name="skills"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $job->skill }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Educational Qualification</label>
                            <textarea
                                name="educational"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $job->education }}</textarea>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Benifits</label>
                            <textarea
                                name="benifits"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $job->benifit }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Deadline *</label>
                            <input
                                type="text"
                                name="deadline"
                                class="form-control datepicker"
                                value="{{ $job->deadline }}"
                            />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Vacancy *</label>
                            <input
                                type="number"
                                name="vacancy"
                                class="form-control"
                                min="1"
                                value="{{ $job->vacancy }}"
                            />
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Category *</label>
                            <select name="job_category_id" class="form-control select2">
                                @foreach ($job_category as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if( $job->job_category_id == $item->id )
                                            selected
                                        @endif
                                    >{{ $item->name }}</option>                                    
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Location *</label>
                            <select name="job_location_id" class="form-control select2">
                                @foreach ($job_location as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if( $job->job_location_id == $item->id )
                                            selected
                                        @endif
                                    >{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Type *</label>
                            <select name="job_type_id" class="form-control select2">
                                @foreach ($job_type as $item)
                                    <option 
                                        value="{{ $item->id }}"
                                        @if( $job->job_type_id == $item->id )
                                            selected
                                        @endif                                        
                                    >{{ $item->type }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Job Experience *</label>
                            <select name="job_experience_id" class="form-control select2">
                                @foreach ($job_experience as $item)
                                    <option
                                        value="{{ $item->id }}"
                                        @if( $job->job_experience_id == $item->id )
                                            selected
                                        @endif
                                    >{{ $item->experience }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Gender *</label>
                            <select name="job_gender_id" class="form-control select2">
                                <option value="1" @if( $job->job_gender_id == 1 ) selected @endif>Male</option>
                                <option value="2" @if( $job->job_gender_id == 2 ) selected @endif>Female</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Salary Range *</label>
                            <select name="job_salary_range_id" class="form-control select2">
                                @foreach ($job_salary as $item)
                                    @if( $item->min_range == 'Above' )
                                        <option 
                                            value="{{ $item->id }}"
                                            @if( $job->job_salary_range_id == $item->id )
                                                selected
                                            @endif
                                        >{{ $item->min_range }} {{ $item->max_range }}</option>
                                    @else
                                        <option 
                                            value="{{ $item->id }}"
                                            @if( $job->job_salary_range_id == $item->id )
                                                selected
                                            @endif
                                        >{{ $item->min_range }}-{{ $item->max_range }}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="" class="form-label">Location Map</label>
                            <textarea
                                name="map_code"
                                class="form-control h-150"
                                cols="30"
                                rows="10"
                            >{{ $job->map_code }}</textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Is Featured?</label>
                            <select name="is_featured" class="form-control select2">
                                <option value="0" @if( $job->is_featured == 0 ) selected @endif>No</option>
                                <option value="1" @if( $job->is_featured == 1 ) selected @endif>Yes</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="" class="form-label">Is Urgent?</label>
                            <select name="is_urgent" class="form-control select2">
                                <option value="0" @if( $job->is_urgent == 0 ) selected @endif>No</option>
                                <option value="1" @if( $job->is_urgent == 1 ) selected @endif>Yes</option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <input
                                type="submit"
                                class="btn btn-primary"
                                value="Submit"
                            />
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection