@extends('admin.layout.app')

@section('heading', 'Create Company Size')

@section('button')
    <div>
        <a href="{{ route( 'admin_company_size' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_company_size_store' ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Size *</label>
                            <input type="text" class="form-control" name="size">
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