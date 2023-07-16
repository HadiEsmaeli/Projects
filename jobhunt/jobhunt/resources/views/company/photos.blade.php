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
                <h2>Photos</h2>
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
                <h4>Add Photo</h4>
                <form action="{{ route( 'company_photo_submit' ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <div class="form-group">
                                <input type="file" name="photo" />
                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group">
                            <input
                                type="submit"
                                class="btn btn-primary btn-sm"
                                value="Upload"
                            />
                        </div>
                    </div>
                </form>

                
                @if( count($image) !== 0 )
                    <h4 class="mt-4">Existing Photos</h4>
                    <div class="photo-all">
                        <div class="row">
                            @foreach ($image as $item)
                                <div class="col-md-6 col-lg-3">
                                    <div class="item mb-1">
                                        <a
                                            href="{{ asset( 'uploads/company/photos/' . $item->photo ) }}"
                                            class="magnific"
                                        ><img src="{{ asset( 'uploads/company/photos/' . $item->photo ) }}" alt="">
                                        <div class="icon">
                                                <i class="fas fa-plus"></i>
                                            </div>
                                            <div class="bg"></div>
                                        </a>
                                    </div>
                                    <a 
                                        href="{{ route( 'company_photo_delete', [$item->id, $item->photo, $item->company_id] ) }}"
                                         class="btn btn-danger btn-sm mb-2">Delete</a>
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