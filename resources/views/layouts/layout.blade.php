<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html class=""><!--<![endif]-->
<head>
	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="">
    <meta name="author" content="">

	<title>Home - Furniture</title>

	<!-- Standard Favicon -->
	<link rel="icon" type="image/x-icon" href="{{ URL::asset('/images/favicon.ico') }}" />
	
	<!-- For iPhone 4 Retina display: -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{ URL::asset('/images/apple-touch-icon-114x114-precomposed.png') }}">
	
	<!-- For iPad: -->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{ URL::asset('/images/apple-touch-icon-72x72-precomposed.png') }}">
	
	<!-- For iPhone: -->
	<link rel="apple-touch-icon-precomposed" href="{{ URL::asset('/images/apple-touch-icon-57x57-precomposed.png') }}">	
	
	<!-- Custom - Theme CSS -->
	<!-- <link rel="stylesheet" type="text/css" href="/node_modules/vuetify/dist/vuetify.min.css"> -->
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}">

	@yield('css')

	<!--[if lt IE 9]>
		<script src="js/html5/respond.min.js"></script>
    <![endif]-->
	
</head>
<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
	<div id="app">
		<!-- Loader -->
		<div id="site-loader" class="load-complete">
			<div class="loader">
				<div class="loader-inner ball-clip-rotate">
					<div></div>
				</div>
			</div>
		</div><!-- Loader /- -->

		<!-- Header -->
		<header class="header-main container-fluid no-padding">
			<!-- SidePanel -->
			<div id="slidepanel">
				<!-- Top Header -->
				<div class="top-header container-fluid no-padding">
					<!-- Container -->
					<div class="container">
						<ul class="contact">
							<li><a href="tel:(+1)123-456-7890" title="(+1) 123 - 456 - 7890"><i class="fa fa-phone" aria-hidden="true"></i><span>Phone :</span> (+1) 123 - 456 - 7890</a></li>
							<li><a href="mailto:Info@Ourdomain.Com" title="Info@Ourdomain.Com"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Email :</span> Info@Ourdomain.Com</a></li>
						</ul>
						<div class="dropdown-bar">
							<div class="language-dropdown dropdown">
								@if(Auth::check())
									<a href="/logout" class="btn"><span>Logout</span></a>
								@else
									<a href="/login" class="btn">Login</a>
								@endif
							</div>
						</div>
					</div><!-- Container /- -->
				</div><!-- Top Header /- -->
				
				<!-- Middel Header -->
				<div class="middle-header container-fluid no-padding">
					<div class="container">
						<div class="row">
							<div class="col-md-5 col-sm-4 col-xs-4">
								<div class="logo-block">
									<a href="index.html"><img src="images/logo-1.png" alt="logo" height="38" width="56"/>Furn<span>Home</span></a>
								</div>
							</div>
							<div class="header-info">
								<div class="col-md-5 col-sm-6 col-xs-6">
									
								</div>
							</div>
							<div class="col-md-2 col-sm-2 col-xs-2 add-to-cart">
								<cart></cart>
							</div>
						</div><!-- Row /- -->
					</div><!-- Container /- -->
				</div><!-- Middel Header /- -->	
			</div>		
			
			<!-- Menu Block -->
			<div class="menu-block menu-block-section container-fluid no-padding">
				<!-- Container -->
				<div class="container">				
					<nav class="navbar ow-navigation">
						<div id="loginpanel" class="desktop-hide">
							<div class="right" id="toggle">
								<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
								<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
							</div>
						</div>
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="text-logo desktop-hide" href="index.html"><span>Furn</span>Home</a>
						</div>
						<div class="navbar-collapse collapse navbar-right" id="navbar">
							<ul class="nav navbar-nav menubar">
								<li class="dropdown active">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Home" href="/">Home</a>
								</li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Home" href="/shop">Shop</a>
								</li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Home" href="shop-2.html">Bed Room</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<li><a title="Shop 2" href="shop-2.html">Shop 2</a></li>
									</ul>
								</li>
								<li><a title="Sofas" href="#saleup-section">Sofas</a></li>
								<li><a title="Latest Product" href="#latest-product">Latest Product</a></li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="best seller" href="shop.html">best seller</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<li><a title="product-detail" href="product-detail.html">product Detail</a></li>
										<li><a title="Cart" href="cart.html">Cart</a></li>
										<li><a title="Checkout" href="checkout.html">Checkout</a></li>
									</ul>
								</li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" title="Latest News" href="#latest-blog">Latest News</a>
									<i class="ddl-switch fa fa-angle-down"></i>
									<ul class="dropdown-menu">
										<li><a title="Blog" href="blog.html">Blog</a></li>
										<li><a title="Blog Post" href="blog-post.html">Blog Post</a></li>
									</ul>
								</li>
								<li><a title="Contact Us" href="contact-us.html">Contact Us</a></li>
							</ul>
						</div>
					</nav><!-- Navigation /- -->
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
		</header><!-- Header /- -->
	
	
		<main class="site-main page-spacing">
			@yield('content')
		</main>
	
		<!-- Footer Main -->
		<footer class="footer-main container-fluid no-padding">
			<div class="container">
				<div class="row">
					<div class="footer-header">
						<a href="index.html" title="Furn Home">Furn<span>Home</span></a>
					</div>
					<div class="footer-social">
						<ul>
							<li><a href="#" title="Facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
							<li><a href="#" title="Twitter"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
							<li><a href="#" title="Google-plus"><i class="fa fa-google-plus" aria-hidden="true"></i></a></li>
							<li><a href="#" title="linkedin"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
						</ul>
					</div>
					<!-- Widget About -->
					<aside class="col-md-4 col-sm-6 col-xs-6 ftr-widget about-widget">
						<h3>About The Store</h3>
						<p>Songs that made the hit parade. Guys like us Those were the days. Wouldn't you it made. Those were the days. Wouldn't you like to get.</p>
						<p><i aria-hidden="true" class="fa fa-phone"></i>Call Us 08 523 456 78</p>
						<p><i aria-hidden="true" class="fa fa-envelope-o"></i><a title="Info@ourdomain.Com" href="mailto:Info@ourdomain.Com">Info@ourdomain.Com</a></p>
						<p><i aria-hidden="true" class="fa fa-map-marker"></i>59 Downtown St, Melbourne, Australia.</p>
					</aside><!-- Widget About /- -->
					<!-- Widget Links -->
					<aside class="col-md-2 col-sm-6 col-xs-6 ftr-widget link-widget">
						<h3>Useful links</h3>
						<ul>
							<li><a href="#" title="Abou Us">About Us</a></li>
							<li><a href="#" title="Our Products">Our Products</a></li>
							<li><a href="#" title="Customer Support">Customer Support</a></li>
							<li><a href="#" title="Our Sitemap">Our Sitemap</a></li>
							<li><a href="#" title="Contact Us">Contact Us</a></li>
						</ul>
					</aside><!-- Widget Links /- -->
					<!-- Widget Contact -->
					<aside class="col-md-3 col-sm-6 col-xs-6 ftr-widget contact-widget">
						<h3>Contact Us</h3>
						<ul>
							<li><a href="#" title="Product Recall">Product Recall</a></li>
							<li><a href="#" title="Gift Vouchers">Gift Vouchers</a></li>
							<li><a href="#" title="Returns & Exchange">Returns & Exchange</a></li>
							<li><a href="#" title="Shipping Options">Shipping Options</a></li>
							<li><a href="#" title="Help & FAQs">Help & FAQs</a></li>
						</ul>
					</aside><!-- Widget Contact /- -->
					<!-- Widget Isnstagram -->
					<aside class="col-md-3 col-sm-6 col-xs-6 ftr-widget instagram-widget">
						<h3>Contact Us</h3>
						<ul>
							<li><a href="#" title=""><img src="images/insta-1.jpg" alt="Insta1" width="83" height="83" /></a></li>
							<li><a href="#" title=""><img src="images/insta-2.jpg" alt="Insta1" width="83" height="83" /></a></li>
							<li><a href="#" title=""><img src="images/insta-3.jpg" alt="Insta1" width="83" height="83" /></a></li>
							<li><a href="#" title=""><img src="images/insta-4.jpg" alt="Insta1" width="83" height="83" /></a></li>
							<li><a href="#" title=""><img src="images/insta-5.jpg" alt="Insta1" width="83" height="83" /></a></li>
							<li><a href="#" title=""><img src="images/insta-6.jpg" alt="Insta1" width="83" height="83" /></a></li>
						</ul>
					</aside><!-- Widget Newsletter /- -->
				</div>
			</div>
		</footer><!-- Footer Main /- -->
	
		<!-- Bottom Footer -->
		<div class="bottom-footer container-fluid no-padding">
			<div class="container">
				<div class="footer-content">
					<div class="footer-copyright">
						<p>&copy; 2018 All Rights Reserved</p>
					</div>
					<div class="footer-breadcrumb pull-right">
						<ol class="breadcrumb">
							<li title="Home" class="active">Home</li>					
							<li><a title="Services" href="#ad-banner-1">Services</a></li>
							<li><a title="terms & condition" href="checkout.html">terms & condition</a></li>
							<li><a title="privacy policy" href="index-2.html#detail-section">privacy policy</a></li>
							<li><a title="Contact Us" href="contact-us.html">Contact Us</a></li>
						</ol>
					</div>
				</div>
			</div>
		</div><!-- Bottom Footer /- -->
	</div>
	
	<!-- JQuery v1.11.3 -->
	<script src="{{ URL::asset('/js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>

	<!-- Library - Js -->
	<script src="{{ URL::asset('libraries/lib.js') }}"></script>
	<!-- Bootstrap JS File v3.3.5 -->
	
	<script src="{{ URL::asset('libraries/jquery.countdown.min.js') }}"></script>
	
	<script src="{{ URL::asset('libraries/lightslider-master/lightslider.js') }}"></script>
	
	<script src="{{ URL::asset('libraries/slick/slick.min.js') }}"></script>

	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	
	<script src="{{ URL::asset('/js/form.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('/js/app.js') }}"></script>

	<!-- Library - Theme JS -->
	<script src="{{ URL::asset('/js/functions.js') }}"></script>

	@yield('js')
</body>
</html>