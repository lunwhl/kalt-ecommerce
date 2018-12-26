@extends('layouts.layout')
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