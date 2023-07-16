@extends('front.layout.app')

@section('main_content')

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


        @section('seo_meta_description'){{ $page_term_item->meta_description }}@endsection
        @section('seo_title'){{ $page_term_item->title }}@endsection


        <link rel="icon" type="image/png" href="uploads/favicon.png" />

        @include('front.layout.styles')
        @include('front.layout.scripts')

        <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    </head>
    <body>

        <div class="page-top" style="background-image: url({{ asset( 'uploads/banners/' . $global_banner->banner_terms ) }})">
            <div class="bg"></div>
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <h2>{{ $page_term_item->heading }}</h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="page-content">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <p>{!! $page_term_item->content !!}</p>
                    </div>
                </div>
            </div>
        </div>

        <div class="scroll-top">
            <i class="fas fa-angle-up"></i>
        </div>

        @include('front.layout.scripts_bottom')


@endsection