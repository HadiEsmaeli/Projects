@extends('front.layout.app')

@section('main_content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @section('seo_meta_description'){{ $post->meta_description }}@endsection
        @section('seo_title'){{ $post->title }}@endsection

        <link rel="icon" type="image/png" href="uploads/favicon.png" />

        @include('front.layout.styles')
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

    <div class="page-top" style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_post ) }})">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $post->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <script
    type="text/javascript"
        src="https://platform-api.sharethis.com/js/sharethis.js#property=5993ef01e2587a001253a261&product=inline-share-buttons"
        async="async"
    ></script>


    <div class="page-content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-12">
                    <div class="featured-photo">
                        <img src="{{ asset( 'uploads/posts/' . $post->photo ) }}" alt="" />
                    </div>
                    <div class="sub">
                        <div class="item">
                            <b><i class="fa fa-clock-o"></i></b>
                            {{ $post->created_at->format('d') }}
                            {{ $post->created_at->format('F') }}
                            {{ $post->created_at->format('Y') }}
                        </div>
                        <div class="item">
                            <b><i class="fa fa-eye"></i></b>
                            {{ $post->total_view }}
                        </div>
                    </div>
                    <div class="main-text">
                        <p>{!! $post->description !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    @include('front.layout.scripts_bottom')


@endsection