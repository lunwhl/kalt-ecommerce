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
	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/style.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/app.css') }}">
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
							<li><a href="mailto:Info@Ourdomain.Com" title="Info@Ourdomain.Com"><i class="fa fa-envelope-o" aria-hidden="true"></i><span>Email :</span> info@kalt.com.my</a></li>
						</ul>
						<div class="dropdown-bar">
							<div class="language-dropdown dropdown">
								@if(Auth::check())
									<button class="btn dropdown-toggle" type="button" id="Username" title="Username" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">{{Auth::user()->name}}<span class="caret"></span></button>
									<ul class="dropdown-menu no-padding">
										<!-- <li><a href="#" title="sarah1">My Profile</a></li> -->
										<li><a href="/api/order">My order</a></li>
										<li><a href="/logout">Logout</a></li>
									</ul>
								@else
									<a onclick="openLogin()" class="btn login-btn">Login</a>
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
								<div>
									<a href="index.html"><img src="/images/kalt.png" alt="logo" width="150"/></a>
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
							<!-- <a class="text-logo desktop-hide" href="index.html"><span>Furn</span>Home</a> -->
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
									<a aria-expanded="false" aria-haspopup="true" role="button" class="dropdown-toggle" href="/home/#about-us">About Us</a>
								</li>
								<li><a href="/home/#our-product">Our Products</a></li>
								<li><a href="/home/#faq">Service</a></li>
								<li><a href="/home/#contact-us">Contact Us</a></li>
								<!-- <li><a title="Contact Us" href="contact-us.html">Contact Us</a></li> -->
							</ul>
						</div>
					</nav><!-- Navigation /- -->
				</div><!-- Container /- -->
			</div><!-- Menu Block /- -->
		</header><!-- Header /- -->
	
	
		<main class="site-main page-spacing">
			@yield('content')
		</main>
	
		<!-- Bottom Footer -->
		<div class="bottom-footer container-fluid no-padding">
			<div class="container">
				<div class="footer-content">
					<div class="footer-copyright">
						<p>&copy; 2018 All Rights Reserved - Website by <a href="https://welory.com.my">welory</a>.</p>
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
	<script type="text/javascript" src="{{ URL::asset('js/app.js') }}"></script>

	<!-- Library - Theme JS -->
	<script src="{{ URL::asset('/js/functions.js') }}"></script>

	@yield('js')
</body>
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