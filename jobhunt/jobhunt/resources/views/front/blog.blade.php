@extends('front.layout.app')

@section('main_content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        @section('seo_meta_description'){{ $page_blog_data->meta_description }}@endsection
        @section('seo_title'){{ $page_blog_data->title }}@endsection

        <link rel="icon" type="image/png" href="uploads/favicon.png" />

        @include('front.layout.styles')
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

    <div class="page-top" style="background-image: url( {{ asset( 'uploads/banners/' . $global_banner->banner_blog ) }} )">
        <div class="bg"></div>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h2>{{ $page_blog_data->heading }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="blog">
        <div class="container">
            <div class="row">
                @foreach( $blog as $item )
                    <div class="col-lg-4 col-md-6">
                        <div class="item">
                            <div class="photo">
                                <img src="{{ asset( 'uploads/posts/' . $item->photo ) }}" alt="" />
                            </div>
                            <div class="text">
                                <h2>
                                    <a href="{{ route( 'post', $item->slug ) }}"
                                    >{{ $item->title }}</a>
                                </h2>
                                <div class="short-des">
                                    <p>{{ $item->short_description }}</p>
                                </div>
                                <div class="button">
                                    <a href="{{ route( 'post', $item->slug ) }}" 
                                        class="btn btn-primary"
                                    >Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                
                <div class="col-md-12">
                    {{ $blog->links() }}
                </div>
            </div>
        </div>
    </div>

    <div class="scroll-top">
        <i class="fas fa-angle-up"></i>
    </div>

    @include('front.layout.scripts_bottom')


@endsection