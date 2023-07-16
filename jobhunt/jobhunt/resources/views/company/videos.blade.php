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
                <h2>Videos</h2>
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
                <h4>Add Video</h4>
                <form action="{{ route( 'company_video_submit' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <div class="form-group">
                                <input
                                    type="text"
                                    name="video_id"
                                    class="form-control"
                                    placeholder="Enter Video Code"
                                />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary btn-sm"
                                value="Submit"
                            />
                        </div>
                    </div>
                </form>
                
                @if( count($video) !== 0 )
                    <h4 class="mt-4">Existing Videos</h4>
                    <div class="video-all">
                        <div class="row">
                            @foreach ($video as $item)
                                <div class="col-md-6 col-lg-3">
                                    <div class="item mb-1">
                                        <a
                                            class="video-button"
                                            href="http://www.youtube.com/watch?v={{ $item->video_id }}"
                                        >
                                            <img
                                                src="http://img.youtube.com/vi/{{ $item->video_id }}/0.jpg"
                                                alt=""
                                            />
                                            <div class="icon">
                                                <i class="far fa-play-circle"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <a 
                                        href="{{ route( 'company_video_delete', [$item->id, $item->video_id, $item->company_id] ) }}"
                                        class="btn btn-danger btn-sm mb-4"
                                        onclick="return confirm('are you sure?')"
                                    >Delete</a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection