@extends('layouts.layout')

@section('layout')
    <title>KALT | Services</title>
    <meta name="description" content="We provide all kinds of services you need including installation, overhaul, concealing, inspection and reparing services. Contact us to find out more." />

     <!-- Schema.org markup for Google+ -->
	<meta itemprop="name" content="KALT | Services">
	<meta itemprop="description" content="We provide all kinds of services you need including installation, overhaul, concealing, inspection and reparing services. Contact us to find out more.">
	<meta itemprop="image" content="{{ url('/images/service-header.png') }}">

	<!-- Open Graph data -->
	<meta property="og:title" content="KALT | Services" />
	<meta property="og:type" content="article" />
	<meta property="og:url" content="{{ url()->current() }}" />
	<meta property="og:image" content="{{ url('/images/service-header.png') }}" />
	<meta property="og:description" content="We provide all kinds of services you need including installation, overhaul, concealing, inspection and reparing services. Contact us to find out more." />
	<meta property="og:site_name" content="KALT" />
@endsection

@section('content')
	<service-page></service-page>
@endsection
@section('js')

@endsection