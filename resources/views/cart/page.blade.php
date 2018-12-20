@extends('layouts.layout')
@section('css')
	<link href="https://fonts.googleapis.com/css?family=Questrial|Raleway:700,900" rel="stylesheet">
    <link href="css/exzo/css/bootstrap.extension.css" rel="stylesheet" type="text/css" />
    <link href="css/exzo/css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/exzo/css/swiper.css" rel="stylesheet" type="text/css" />
    <link href="css/exzo/css/sumoselect.css" rel="stylesheet" type="text/css" />
    <link href="css/exzo/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
@endsection
@section('content')
	<cart-page is_auth="{{$is_auth}}"></cart-page>
@endsection
@section('js')
    <script src="css/exzo/js/swiper.jquery.min.js"></script>
    <script src="css/exzo/js/global.js"></script>

    <!-- styled select -->
    <script src="css/exzo/js/jquery.sumoselect.min.js"></script>

    <!-- counter -->
    <script src="css/exzo/js/jquery.classycountdown.js"></script>
    <script src="css/exzo/js/jquery.knob.js"></script>
    <script src="css/exzo/js/jquery.throttle.js"></script>

    <!-- masonry -->
    <script src="css/exzo/js/isotope.pkgd.min.js"></script>
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