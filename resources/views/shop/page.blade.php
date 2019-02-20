@extends('layouts.layout')
@section('css')
	<link href="css/sebian/css/main.css" rel="stylesheet" type="text/css">
	<link href="css/sebian/css/style.css" rel="stylesheet" type="text/css">
	<link href="css/sebian/css/responsive.css" rel="stylesheet" type="text/css">
	<link href="css/sebian/css/animate.css" rel="stylesheet" type="text/css">
	<link href="css/sebian/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	<link href="css/sebian/css/custom.css" rel="stylesheet" type="text/css">
	<script src="css/sebian/js/modernizr.js"></script>
@endsection
@section('content')
	<shop-page is_auth="{{$is_auth}}"></shop-page>
@endsection
@section('js')
	<script src="css/sebian/js/wow.min.js"></script> 
	<script src="css/sebian/js/own-menu.js"></script> 
	<script src="css/sebian/js/owl.carousel.min.js"></script> 
	<script src="css/sebian/js/jquery.magnific-popup.min.js"></script> 
	<script src="css/sebian/js/jquery.isotope.min.js"></script> 
	<script src="css/sebian/js/jquery.nouislider.min.js"></script> 
	<script src="css/sebian/js/jquery.flexslider-min.js"></script> 

	<!-- SLIDER REVOLUTION 4.x SCRIPTS  --> 
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.tools.min.js"></script> 
	<script type="text/javascript" src="rs-plugin/js/jquery.themepunch.revolution.min.js"></script>
	<script src="css/sebian/js/main.js"></script> 
	<script>

		function ended(values, handle, unencoded, tap, positions) {
			window.event.$emit('slider-changed');
		}

		jQuery(document).ready(function($) {
		  let btuParam = new URL(location.href).searchParams.get("btu") ? new URL(location.href).searchParams.get("btu") : 9000;
		  //  Price Filter ( noUiSlider Plugin)
		    var slider = $("#price-range").noUiSlider({
			    range: {
			      'min': [ 9000 ],
			      'max': [ 60000 ]
			    },
			    step: 10,
			    behaviour: 'tap',
			    start: [btuParam, 60000],
			        connect:true,
			        serialization:{
			            lower: [
			        $.Link({
			          target: $("#price-min")
			        })
			      ],
			      upper: [
			        $.Link({
			          target: $("#price-max")
			        })
			      ],
			      format: {
			      // Set formatting
			        decimals: 0,
			      }
			        }
			  }).on('change', ended);
		    // slider.noUiSlider;
		});

		


	</script>
@endsection