@extends('admin.layout.app')

@section('heading', 'Edit Why Choose')

@section('button')
    <div>
        <a href="{{ route( 'admin_why_choose' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_why_choose_update', $why_choose->id ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text"
                                class="form-control"
                                name="heading"
                                value="{{ $why_choose->heading }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Text *</label>
                            <textarea 
                                class="form-control h_100" 
                                name="text"
                            >{{ $why_choose->text }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon *</label>
                            <input type="text"
                                class="form-control"
                                name="icon"
                                value="{{ $why_choose->icon }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Icon Preview *</label>
                            <div>
                                <i class="{{ $why_choose->icon }}"></i>
                            </div>
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