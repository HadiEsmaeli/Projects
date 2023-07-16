@extends('admin.layout.app')

@section('heading', 'Edit Job Location')

@section('button')
    <div>
        <a href="{{ route( 'admin_job_location' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_job_location_update', $job_location->id ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Location Name *</label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                value="{{ $job_location->name }}"
                            >
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Edit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection