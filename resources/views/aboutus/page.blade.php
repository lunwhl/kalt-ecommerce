@extends('layouts.layout')

@section('layout')
    <title>KALT | About Us</title>
    <meta name="description" content="We are a modernized online business to Ban Leng, who has 30 years experience in air conditioning. We, an one stop air conditioner online shop, committed to provide you with unique shopping experience." />

     <!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="KALT | About Us">
	<meta itemprop="description" content="We are a modernized online business to Ban Leng, who has 30 years experience in air conditioning. We, an one stop air conditioner online shop, committed to provide you with unique shopping experience.">
	<meta itemprop="image" content="{{ url('/images/about-us-35-years.png') }}">

	<!-- Open Graph data -->
	<meta property="og:title" content="KALT | About Us" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ url('/images/about-us-35-years.png') }}" />
	<meta property="og:description" content="We are a modernized online business to Ban Leng, who has 30 years experience in air conditioning. We, an one stop air conditioner online shop, committed to provide you with unique shopping experience." />
	<meta property="og:site_name" content="KALT" />
@endsection

@section('content')
	<about-page></about-page>
@endsection
@section('js')

@endsection