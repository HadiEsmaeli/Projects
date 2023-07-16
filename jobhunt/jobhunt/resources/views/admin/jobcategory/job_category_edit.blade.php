@extends('admin.layout.app')

@section('heading', 'Edit Job Category')

@section('button')
    <div>
        <a href="{{ route( 'admin_job_category' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_job_category_update', $job_category->id ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Category Name *</label>
                            <input type="text"
                                class="form-control"
                                name="name"
                                value="{{ $job_category->name }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon Preview *</label>
                            <div>
                                <i class="{{ $job_category->icon }}"></i>
                            </div>
                        </div>
                        <div class="form-group mb-3">
                            <label>Category Icon *</label>
                            <input type="text"
                                class="form-control"
                                name="icon"
                                value="{{ $job_category->icon }}"
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