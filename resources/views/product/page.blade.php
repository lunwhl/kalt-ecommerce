@extends('layouts.layout')

@section('meta')
    <title>KALT | {{ $product->name }}</title>
    <meta name="description" content="{{ $product->meta_description }}" />

    <!-- Schema.org markup for Google+ -->
    <meta itemprop="name" content="{{ $product->name }}">
    <meta itemprop="description" content="{{ $product->meta_description }}">
    <meta itemprop="image" content="{{ url('/storage/' . $product->image_path) }}">

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="product">
    <meta name="twitter:site" content="@publisher_handle">
    <meta name="twitter:title" content="{{ $product->name }}">
    <meta name="twitter:description" content="{{ $product->meta_description }}">
    <meta name="twitter:creator" content="@author_handle">
    <meta name="twitter:image" content="{{ url('/storage/' . $product->image_path) }}">
    <meta name="twitter:data1" content="RM{{ $product->price }}">
    <meta name="twitter:label1" content="Price">

    <!-- Open Graph data -->
    <meta property="og:title" content="{{ $product->name }}" />
    <meta property="og:type" content="product" />
    <meta property="og:site_name" content="KALT Penang" />
    <meta property="og:price:amount" content="{{ $product->price }}" />
    <meta property="og:price:currency" content="MYR" /> 
    <meta property="product:price:amount" content="{{ $product->price }}" />
    <meta property="product:price:currency" content="MYR" /> 
    <meta property="product:brand" content="{{ $product->meta_brand }}" />
    <meta property="og:title" content="{{ $product->name }}">
    <meta property="og:description" content="{{ $product->meta_description }}">
    <meta property="og:image" content="{{ url('/storage/' . $product->image_path) }}">
    <meta property="og:url" content="{{ url()->current() }}">
@endsection

@section('css')
	<link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">
    <link href="{{ URL::asset('/css/exzo/css/bootstrap.extension.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/css/exzo/css/style.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/css/exzo/css/swiper.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/css/exzo/css/sumoselect.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ URL::asset('/css/exzo/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/vendor/froala_styles.min.css') }}" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	<product-page :product="{{$product}}"></product-page>
@endsection
@section('js')
    <script src="{{ URL::asset('/css/exzo/js/swiper.jquery.min.js') }}"></script>
    <script src="{{ URL::asset('/css/exzo/js/global.js') }}"></script>

    <!-- styled select -->
    <script src="{{ URL::asset('/css/exzo/js/jquery.sumoselect.min.js') }}"></script>

    <!-- counter -->
    <script src="{{ URL::asset('/css/exzo/js/jquery.classycountdown.js') }}"></script>
    <script src="{{ URL::asset('/css/exzo/js/jquery.knob.js') }}"></script>
    <script src="{{ URL::asset('/css/exzo/js/jquery.throttle.js') }}"></script>

    <!-- masonry -->
    <script src="{{ URL::asset('/css/exzo/js/isotope.pkgd.min.js') }}"></script>
    <script>
        $(window).load(function(){
            var $container = $('.grid').isotope({
                itemSelector: '.grid-item',
                masonry: {
                    columnWidth: '.grid-sizer'
                }
            });
        });
    </script>
@endsection