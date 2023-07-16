@extends('admin.layout.app')

@section('heading', 'Create Salary')

@section('button')
    <div>
        <a href="{{ route( 'admin_salary' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_salary_store' ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Salary *</label>
                            <input type="text" class="form-control" name="range">
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