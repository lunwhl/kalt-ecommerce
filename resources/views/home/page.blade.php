@extends('layouts.layout')

@section('meta')
    <title>KALT | Home</title>
    <meta name="description" content="Buy air conditioners online, aircond installation, inspection & repair. Brands from Daikin, Panasonic, York Malaysia & more. Over 30 years’ experience, with the cheapest price in town." />

     <!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="KALT">
	<meta itemprop="description" content="Buy air conditioners online, aircond installation, inspection & repair. Brands from Daikin, Panasonic, York Malaysia & more. Over 30 years’ experience, with the cheapest price in town.">
	<meta itemprop="image" content="{{ url('/images/Header_Photo.png') }}">

	<!-- Open Graph data -->
	<meta property="og:title" content="KALT" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ url('/images/Header_Photo.png') }}" />
	<meta property="og:description" content="Buy air conditioners online, aircond installation, inspection & repair. Brands from Daikin, Panasonic, York Malaysia & more. Over 30 years’ experience, with the cheapest price in town." />
	<meta property="og:site_name" content="KALT" />
@endsection

@section('content')
	<home-page is_auth="{{$is_auth}}"></home-page>
@endsection
@section('js')

@endsection