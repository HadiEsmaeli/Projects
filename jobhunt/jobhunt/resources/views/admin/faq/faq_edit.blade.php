@extends('admin.layout.app')

@section('heading', 'Edit FAQ')

@section('button')
    <div>
        <a href="{{ route( 'admin_faq' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_faq_update', $faq->id ) }}" method="POST">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Question *</label>
                            <input type="text" class="form-control" name="question" value="{{ $faq->question }}">
                        </div>
                        <div class="form-group mb-3">
                            <label>Answer *</label>
                            <textarea name="answer" class="form-control editor" cols="30" rows="10"
                            >{{ $faq->answer }}</textarea>
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