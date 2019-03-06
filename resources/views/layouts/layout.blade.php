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

	<title>Kalt</title>

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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css?v=2.9') }}">
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/fonts/GothamHTF-Book.otf') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css?v=1.9') }}">
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
			<div class="menu-block menu-block-section container-fluid no-padding">
			<!-- Container -->
				<div class="container mobile-menu">				
					<nav class="navbar ow-navigation">
						<div id="loginpanel" class="desktop-hide">
							<div class="right" id="toggle">
								<div class="dropdown-bar">
									<div class="language-dropdown dropdown">
										@if(Auth::check())
											<button onclick="toProfile()" class="btn dropdown-toggle" type="button" id="Username" title="Username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}}</button>
											<!-- <ul class="dropdown-menu no-padding"> -->
												<!-- <li><a href="#" title="sarah1">My Profile</a></li> -->
												<!-- <li><a href="/api/home/profile">My profile</a></li>
												<li><a href="/api/order">My order</a></li>
												<li><a href="/logout">Logout</a></li>
											</ul> -->
										@else
											<a onclick="openLogin()" class="login-btn" style="padding: 4px 18px;">LOG IN</a>
										@endif
									</div>
								</div>
								<cart></cart>
								<!-- <a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a> -->
							</div>
						</div>
						<div class="navbar-header">
							<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a href="/"><img src="/images/kalt.png" alt="logo" width="150"/></a>
						</div>
						<div class="navbar-collapse collapse navbar-right" id="navbar">
							<ul class="nav navbar-nav menubar">
								<li class="dropdown homeAnchor">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/">Home</a>
								</li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/shop">Shop</a>
								</li>
								<li class="dropdown">
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/about">About Us</a>
								</li>
								<li><a href="/home/#our-product">Latest Products</a></li>
								<li><a href="/service">Service</a></li>
								<li><a href="/home/#contact-us">Contact Us</a></li>
								@if(Auth::check())
									<li><a href="/api/home/profile">My profile</a></li>
									<li><a href="/api/order">My order</a></li>
									<li><a href="/logout">Logout</a></li>
								@endif
							</ul>
						</div>
					</nav><!-- Navigation /- -->
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
			<!-- SidePanel -->
			<div id="slidepanel">
				<!-- Middel Header -->
				<div class="desktop-menu middle-header top-header container-fluid no-padding">
					<div class="container">
						<div class="row">
							<div class="col-md-2 col-sm-12 col-xs-12">
								<div style="display: inline-block;">
									<a href="/"><img src="/images/kalt.png" alt="logo" class="mg-top-16" width="150"/></a>
								</div>
								<div class="container-fluid no-padding" style="display: inline-block; float: right;">
								<!-- Container -->			
									<nav class="navbar ow-navigation">
										<!-- <div id="loginpanel" class="desktop-hide">
											<div class="right" id="toggle">
												<a id="slideit" href="#slidepanel"><i class="fo-icons fa fa-inbox"></i></a>
												<a id="closeit" href="#slidepanel"><i class="fo-icons fa fa-close"></i></a>
											</div>
										</div> -->
										<div class="navbar-header" style="margin-top: 10px;">
											<button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
												<span class="sr-only">Toggle navigation</span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
												<span class="icon-bar"></span>
											</button>
											<!-- <a class="text-logo desktop-hide" href="index.html"><span>Furn</span>Home</a> -->
										</div>
									</nav><!-- Navigation /- -->
							</div><!-- Menu Block /- -->
							</div>
							<div class="header-info">
								<div class="col-md-8 col-sm-12 col-xs-12">
									<!-- Menu Block -->
									<div class="menu-block menu-block-section container-fluid no-padding">
										<!-- Container -->
										<div class="container">				
											<nav class="navbar ow-navigation">
												<div class="navbar-collapse collapse navbar-right" id="navbar">
													<ul class="nav navbar-nav menubar">
														<li class="dropdown homeAnchor">
															<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/">Home</a>
														</li>
														<li class="dropdown">
															<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/shop">Shop</a>
														</li>
														<li class="dropdown">
															<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/about">About Us</a>
														</li>
														<li><a href="/home/#our-product">Latest Products</a></li>
														<li><a href="/service">Service</a></li>
														<li><a href="/home/#contact-us">Contact</a></li>
														<!-- <li><a title="Contact Us" href="contact-us.html">Contact Us</a></li> -->
													</ul>
												</div>
											</nav><!-- Navigation /- -->
										</div><!-- Container /- -->
									</div><!-- Menu Block /- -->
								</div>
							</div>
							<div class="col-md-2 col-sm-12 col-xs-12 add-to-cart">
								<div class="dropdown-bar">
									<div class="language-dropdown dropdown">
										@if(Auth::check())
											<button class="btn dropdown-toggle" type="button" id="Username" title="Username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}}<span class="caret"></span></button>
											<ul class="dropdown-menu no-padding">
												<!-- <li><a href="#" title="sarah1">My Profile</a></li> -->
												<li><a href="/api/home/profile">My profile</a></li>
												<li><a href="/api/order">My order</a></li>
												<li><a href="/logout">Logout</a></li>
											</ul>
										@else
											<a onclick="openLogin()" class="login-btn">LOG IN</a>
										@endif
									</div>
								</div>
								<cart></cart>
							</div>
						</div><!-- Row /- -->
					</div><!-- Container /- -->
				</div><!-- Middel Header /- -->	
				<div class="fb-customerchat"
		            page_id="2188187484836926"
		            theme_color="#4267b2"
		            logged_in_greeting="Hi! How can we help you?"
		            logged_out_greeting="GoodBye!... Hope to see you soon."
		            minimized="false">
		    	</div>
			</div>		
			
			
		</header><!-- Header /- -->
	
	
		<main class="site-main page-spacing">
			@yield('content')
		</main>
	
		<!-- Bottom Footer -->
		<div class="bottom-footer container-fluid no-padding">
			<div class="container">
				<div class="footer-content">
					<div class="footer-copyright">
						<p>&copy; 2019 All Rights Reserved - Website by <a href="https://welory.com.my">welory</a>.</p>
					</div>
				</div>
			</div>
		</div><!-- Bottom Footer /- -->
	</div>
	
	<!-- JQuery v1.11.3 -->
	<script src="{{ URL::asset('js/jquery.min.js') }}"></script>
	<script src="{{ URL::asset('js/bootstrap.min.js') }}"></script>

	<!-- Library - Js -->
	<script src="{{ URL::asset('libraries/lib.js') }}"></script>
	<!-- Bootstrap JS File v3.3.5 -->
	
	<script src="{{ URL::asset('libraries/jquery.countdown.min.js') }}"></script>
	
	<script src="{{ URL::asset('libraries/lightslider-master/lightslider.js') }}"></script>
	
	<script src="{{ URL::asset('libraries/slick/slick.min.js') }}"></script>

	<!-- Library - Google Map API -->
	<script src="https://maps.googleapis.com/maps/api/js?v=3.exp"></script>
	
	<script src="{{ URL::asset('js/form.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('js/app.js?v=2.93') }}"></script>

	<!-- Library - Theme JS -->
	<script src="{{ URL::asset('/js/functions.js') }}"></script>

	@yield('js')
</body>
<script>
	window.fbAsyncInit = function() {
	FB.init({
	      appId            : '1121237594710070',
	      autoLogAppEvents : true,
	      xfbml            : true,
	      version          : 'v2.11'
	    });
	  };
	(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js";
	  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
</script>
<script>
$(function(){
    var current = location.pathname;
    $('#navbar li a').each(function(){
        var $this = $(this);
        // // if the current path is like this link, make it active
        if($this.attr('href') === current){
            $this.parent('li').addClass('active');
        }
    })
})

function openLogin(){
	window.event.$emit("login-dialog", {'openDialog': true})
}

function toProfile(){
	window.location.href = '/api/home/profile';
}

jQuery(document).ready(function(jQuery) {    
		if(location.pathname === '/' || location.pathname === '/home'){        
            var topMenu = jQuery(".menubar"),
                offset = 70,
                topMenuHeight = topMenu.outerHeight()+offset,
                // All list items
                menuItems =  topMenu.find('a[href*="#"]'),
                // Anchors corresponding to menu items
                scrollItems = menuItems.map(function(){
                  var href = jQuery(this).attr("href"),
                  id = href.substring(href.indexOf('#')),

                  item = jQuery(id);
                  //console.log(item)
                  if (item.length) { return item; }
                });

            // so we can get a fancy scroll animation
            menuItems.click(function(e){
              var href = jQuery(this).attr("href"),
                id = href.substring(href.indexOf('#'));
                  offsetTop = href === "#" ? 0 : jQuery(id).offset().top-topMenuHeight+1;
              jQuery('html, body').stop().animate({ 
                  scrollTop: offsetTop
              }, 900);
              e.preventDefault();
            });

            // Bind to scroll
            jQuery(window).scroll(function(){
               // Get container scroll position
               var fromTop = jQuery(this).scrollTop()+topMenuHeight;

               // Get id of current scroll item
               var cur = scrollItems.map(function(){
                 if (jQuery(this).offset().top < fromTop)
                   return this;
               });

               // Get the id of the current element
               cur = cur[cur.length-1];
               var id = cur && cur.length ? cur[0].id : "";               

               menuItems.parent().removeClass("active")
               if(id){
               		$('.homeAnchor').removeClass("active");
                    menuItems.parent().end().filter("[href*='#"+id+"']").parent('li').addClass("active");
               } else {
               		$('.homeAnchor').addClass("active");
               }

            })
        }
    })
</script>
</html>