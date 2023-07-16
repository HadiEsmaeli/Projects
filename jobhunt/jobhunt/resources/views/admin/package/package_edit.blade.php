@extends('admin.layout.app')

@section('heading', 'Edit Package')

@section('button')
    <div>
        <a href="{{ route( 'admin_package' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_package_update', $package->id ) }}" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Name *</label>
                                    <input type="text" value="{{ $package->package_name }}"
                                        class="form-control"
                                        name="package_name"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Package Price *</label>
                                    <input type="text" value="{{ $package->package_price }}"
                                        class="form-control"
                                        name="package_price"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Number of Days *</label>
                                    <input type="text" value="{{$package->package_days}}" 
                                        class="form-control" 
                                        name="package_days"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Display Time *</label>
                                    <input type="text" value="{{$package->package_display_time}}"
                                        class="form-control"
                                        name="package_display_time"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Jobs *</label>
                                    <input type="text" value="{{$package->total_allowed_jobs}}"
                                    class="form-control"
                                    name="total_allowed_jobs"
                                >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Featured Jobs *</label>
                                    <input type="text" value="{{$package->total_allowed_featured_jobs}}"
                                        class="form-control"
                                        name="total_allowed_featured_jobs"
                                    >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Photos *</label>
                                    <input type="text" value="{{$package->total_allowed_photos}}"
                                        class="form-control"
                                        name="total_allowed_photos"
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label>Total Allowed Videos Jobs *</label>
                                    <input type="text" value="{{$package->total_allowed_videos}}"
                                        class="form-control"
                                        name="total_allowed_videos"
                                    >
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection