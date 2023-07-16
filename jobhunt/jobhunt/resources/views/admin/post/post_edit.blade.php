@extends('admin.layout.app')

@section('heading', 'Edit Post')

@section('button')
    <div>
        <a href="{{ route( 'admin_post' ) }}" class="btn btn-primary"><li class="fas fa-plus"></li> View All</a>
    </div>
@endsection

@section('main_content')

<div class="section-body">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route( 'admin_post_update', $post->id ) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label>Photo *</label>
                            <input type="file" class="form-control" name="photo">
                        </div>
                        <div class="form-group mb-3">
                            <label>Existing Photo *</label>
                            <img src="{{ asset( 'uploads/posts/' . $post->photo ) }}" 
                                class="w_150"
                                alt=""
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Heading *</label>
                            <input type="text" class="form-control" 
                                name="heading"
                                value="{{ $post->heading }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Slug *</label>
                            <input type="text" class="form-control"
                                name="slug"
                                value="{{ $post->slug }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Short Description *</label>
                            <textarea name="short_description"
                                class="form-control h_100"
                                cols="30"
                                rows="10"
                            >{{ $post->short_description }}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label>Description *</label>
                            <textarea name="description"
                                class="form-control editor"
                                cols="30"
                                rows="10"
                            >{{ $post->description }}</textarea>
                        </div>
                        <h4 class="seo_section">SEO Section</h4>
                        <div class="form-group mb-3">
                            <label>Title *</label>
                            <input type="text" class="form-control" 
                                name="title"
                                value="{{ $post->title }}"
                            >
                        </div>
                        <div class="form-group mb-3">
                            <label>Meta Description *</label>
                            <textarea name="meta_description"
                                class="form-control h_100"
                                cols="30"
                                rows="10"
                            >{{ $post->meta_description }}</textarea>
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