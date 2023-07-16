@extends('admin.layout.app')

@section('heading', 'Edit Company Industry')

@section('button')
    <div>
        <a href="{{ route( 'admin_company_industry' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_company_industry_update', $company_industry->id ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Industry Name *</label>
                            <input type="text"
                                class="form-control"
                                name="industry_name"
                                value="{{ $company_industry->industry_name }}"
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