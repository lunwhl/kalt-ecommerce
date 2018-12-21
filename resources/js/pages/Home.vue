
	<!-- Photo Slider -->
	<template>
		<div data-app="true">
			<div class="photo-slider container-fluid no-padding">
				<!-- Main Carousel -->
				<div id="main-carousel" class="carousel slide carousel-fade" data-ride="carousel">
					<ol class="carousel-indicators">
						<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#main-carousel" data-slide-to="1"></li>
						<li data-target="#main-carousel" data-slide-to="2"></li>
					</ol>
					<div role="listbox" class="carousel-inner">
						<div class="item active">
							<div class="carousel-caption">
								<h3 data-animation="animated fadeInLeft">New Way to Design Your Home</h3>
								<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
								<div class="col-md-12">
									<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
								</div>
								<img data-animation="animated fadeInDown" src="images/slider-1.png" alt="slider" width="900" height="342" />
							</div>
						</div>
						<div class="item slide-1">
							<div class="carousel-caption">
								<h3 data-animation="animated fadeInLeft">Give Us Something To Assemble</h3>
								<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
								<div class="col-md-12">
									<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
								</div>
								<img data-animation="animated fadeInDown" src="images/slider-2.png" alt="slider" width="722" height="343" />
							</div>
						</div>
						<div class="item slide-2">
							<div class="carousel-caption">
								<h3 data-animation="animated fadeInLeft">We like To Work A Lot With Wood</h3>
								<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
								<div class="col-md-12">
									<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
								</div>
								<img data-animation="animated fadeInDown" src="images/slider-3.png" alt="slider" width="1056" height="345" />
							</div>
						</div>
					</div>
				</div><!-- Main Carousel /-  -->
			</div><!-- Photo Slider /- -->
			
			<!-- Our Product -->
			
			<div class="latest-product our-products container-fluid no-padding woocommerce">
				<div class="col-sm-12 animate fadeInUp" data-wow-delay="0.2s">
				<div class="section-padding"></div>
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Our Products</h3>
					</div><!-- Section Header /- -->
					<ul id="filters" class="products-categories no-left-padding">
						<li id="latest"><a class="product-link" href="javascript:void(0)">Latest Products</a></li>
					</ul>

					<ListProduct :products="latestProducts" :fromHome="true"></ListProduct>	
				</div><!-- Container /- -->
				<div class="section-padding"></div>
			</div><!-- Our Product /- -->
		</div>
			
			<!-- Latest Product -->
			<div id="latest-product" class="latest-product container-fluid no-padding woocommerce">
				<div class="section-padding"></div>
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Latest Products</h3>
					</div><!-- Section Header /- -->
					<ul class="products">
						<li class="product">							
							<a href="product-detail.html" title="Prouct">
								<span class="product-img">
									<img src="images/product-1.jpg" width="270" height="360" alt="product"/>
								</span>
								<h3>plastic net chairs</h3>
								<span class="price"><span class="amount">$15.00</span></span>
							</a>
							<p class="hover-content">
								<a title="Add To Cart" href="#" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
								<span>
									<a href="#" class="icons"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-retweet" aria-hidden="true"></i></a>
								</span>
							</p>
						</li>
						<li class="product">							
							<a href="product-detail.html" title="Prouct">
								<span class="product-img">
									<img src="images/product-2.jpg" width="270" height="360" alt="product"/>
								</span>
								<h3>official chairs</h3>
								<span class="price"><span class="amount">$20.00</span></span>
							</a>
							<p class="hover-content">
								<a title="Add To Cart" href="#" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
								<span>
									<a href="#" class="icons"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-retweet" aria-hidden="true"></i></a>
								</span>
							</p>
						</li>
						<li class="product">							
							<a href="product-detail.html" title="Prouct">
								<span class="product-img">
									<img src="images/product-3.jpg" width="270" height="360" alt="product"/>
								</span>
								<h3>Luxury Chairs</h3>
								<span class="price"><span class="amount">$55.00</span><del>$70.00</del></span>
							</a>
							<p class="hover-content">
								<a title="Add To Cart" href="#" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
								<span>
									<a href="#" class="icons"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-retweet" aria-hidden="true"></i></a>
								</span>
							</p>
						</li>
						<li class="product">							
							<a href="product-detail.html" title="Prouct">
								<span class="product-img">
									<img src="images/product-4.jpg" width="270" height="360" alt="product"/>
								</span>
								<h3>Modern Icez chair</h3>
								<span class="price"><span class="amount">$18.00</span></span>
							</a>
							<p class="hover-content">
								<a title="Add To Cart" href="#" class="button product_type_simple add_to_cart_button"><i class="fa fa-shopping-cart" aria-hidden="true"></i>Add to cart</a>
								<span>
									<a href="#" class="icons"><i class="fa fa-heart" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-eye" aria-hidden="true"></i></a>
									<a href="#" class="icons"><i class="fa fa-retweet" aria-hidden="true"></i></a>
								</span>
							</p>
						</li>
					</ul>
				</div><!-- Container /- -->
			</div><!-- Latest Product /- -->
			
			<!-- Clients -->
			<div class="clients container-fluid no-padding">
				<div class="container">
					<div class="clients-carousel">
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-1.png" alt="client-1"/></a></div>
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-2.png" alt="client-2"/></a></div>
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-3.png" alt="client-3"/></a></div>
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-4.png" alt="client-4"/></a></div>
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-5.png" alt="client-5"/></a></div>
						<div class="col-md-12 item"><a href="#" title="client"><img src="images/client-6.png" alt="client-6"/></a></div>
					</div>
				</div><!-- Container /- -->
			</div><!-- Client /- -->
			
			<!-- Latest Blog -->
			<div id="latest-blog" class="latest-blog container-fluid no-padding">
				<div class="section-padding"></div>
				<!-- Container -->
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>Latest News</h3>
					</div><!-- Section Header /- -->
					<article class="type-post">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="entry-cover">
								<a href="blog-post.html" title="Recent Blog">
									<img src="images/latest-blog-1.jpg" alt="blog" width="370" height="440">
									<div class="image-gradient"></div>
								</a>
								<div class="image-icon">
									<a href="#" title="file-image"><i class="fa fa-file-image-o" aria-hidden="true"></i></a>
								</div>
								<div class="latest-blog-content">
									<h3 class="entry-title"><a href="blog-post.html" title="Here's the story of man Brady who busy ">Here's the story of man Brady who busy </a></h3>
									<div class="post-date"><span>April 27th,2016</span></div>
								</div>
							</div>
						</div>
					</article>
					
					<article class="type-post">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="entry-cover">
								<a href="blog-post.html" title="Recent Blog">
									<img src="images/latest-blog-2.jpg" alt="blog" width="370" height="440">
									<div class="image-gradient"></div>
								</a>
								<div class="image-icon">
									<a href="#" title="file-image"><i class="fa fa-file-text-o" aria-hidden="true"></i></a>
								</div>
								<div class="latest-blog-content">
									<h3 class="entry-title"><a href="blog-post.html" title="Come and dance on our floor Take step">Come and dance on our floor Take step</a></h3>
									<div class="post-date"><span>April 27th,2016</span></div>
								</div>
							</div>
						</div>
					</article>
					
					<article class="type-post">
						<div class="col-md-4 col-sm-6 col-xs-6">
							<div class="entry-cover">
								<a href="blog-post.html" title="Recent Blog">
									<img src="images/latest-blog-3.jpg" alt="blog" width="370" height="440">
									<div class="image-gradient"></div>
								</a>
								<div class="image-icon">
									<a href="#" title="file-image"><i class="fa fa-file-video-o" aria-hidden="true"></i></a>
								</div>
								<div class="latest-blog-content">
									<h3 class="entry-title"><a href="blog-post.html" title="They were four men living all together yet ">They were four men living all together yet </a></h3>
									<div class="post-date"><span>April 27th,2016</span></div>
								</div>
							</div>
						</div>
					</article>
				</div><!-- Container /- -->
				<div class="section-padding"></div>
			</div><!-- Latest Blog /- -->
			
			<!-- Subscribe Section -->
			<div class="subscribe-section container-fluid no-padding">
				<div class="container">
					<div class="subscribe-content">
						<h5>Our Latest Collection</h5>
						<h3>save 50% Off Sale</h3>
						<p>Be the first to know about latest and modern furniture</p>
						<div class=" col-md-6 col-sm-8 col-xs-10 input-group">
							<input type="text" placeholder="Your Email Address" class="form-control">
							<span class="input-group-btn">
								<button type="button" title="Sign Up" class="btn btn-default">Sign Up</button>
							</span>
						</div><!-- /input-group -->
					</div>
				</div>
			</div><!-- Subscribe Section /- -->
			
			<!-- Testimonial Section -->
			<div class="testimonial-section container-fluid no-padding">
				<div class="section-padding"></div>
				<div class="container">
					<!-- Section Header -->
					<div class="section-header">
						<h3>words from clients</h3>
					</div><!-- Section Header /- -->
					<div class="testimonials-box">
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>Groovin' all week with you. Well we're movin' on up to the east side to a deluxe apartment in the sky well we're movin'</p>
								<h3>Jason Smith</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-1.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>To a deluxe apartment in the sky. These Happy Days are yours and mine Happy Days. Movin' up to the east side.</p>
								<h3>mitchel jonson</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-2.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>These days are all share them with me oh baby. Goodbye gray sky hello blue. There's nothing can hold me.</p>
								<h3>chris evans</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-3.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>Groovin' all week with you. Well we're movin' on up to the east side to a deluxe apartment in the sky well we're movin'</p>
								<h3>Jason Smith</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-1.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>To a deluxe apartment in the sky. These Happy Days are yours and mine Happy Days. Movin' up to the east side.</p>
								<h3>mitchel jonson</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-2.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>These days are all share them with me oh baby. Goodbye gray sky hello blue. There's nothing can hold me.</p>
								<h3>chris evans</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-3.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>Groovin' all week with you. Well we're movin' on up to the east side to a deluxe apartment in the sky well we're movin'</p>
								<h3>Jason Smith</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-1.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>To a deluxe apartment in the sky. These Happy Days are yours and mine Happy Days. Movin' up to the east side.</p>
								<h3>mitchel jonson</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-2.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
						<div class="col-md-12">
							<div class="testimonial-content">
								<p>These days are all share them with me oh baby. Goodbye gray sky hello blue. There's nothing can hold me.</p>
								<h3>chris evans</h3>
								<h5>Happy Customer</h5>
							</div>
							<div class="testimonial-author">						
								<i><img src="images/testi-3.jpg" alt="testi" width="96" height="96"/></i>
							</div>
						</div>
					</div>
				</div>
				<div class="section-padding"></div>
			</div><!-- Testimonial Section /- -->
			<div class="fb-customerchat"
					page_id="2188187484836926"
					theme_color="#459645"
					logged_in_greeting="Hi! How can we help you?"
					logged_out_greeting="GoodBye!... Hope to see you soon."
					minimized="false">
			</div>
			<share></share>
		</div>
	</template>
@stop

<script>
	import ListProduct from '../components/ListProduct.vue';
	import Share from '../components/Share.vue';

    export default {
    	components: {
			Share,
			ListProduct
		},

    	props: ['is_auth'],

    	data() {
    		return {
    			isLoading: true,
    			latestProducts: [],
    			testCart: [],
    			Cart: [],
    		};
    	},

        mounted() {
        	this.getCart();
            this.getLatestProduct();
            window.event.$on("share-to-shop", (value) => {
        		window.event.$emit("share-dialog", {'openDialog': value['openDialog'], 'product': value['product']});
            });
        },

        methods: {
        	getLatestProduct() {
        		axios.post('home/products/latest')
        		.then(response => this.setLastestProduct(response.data));
        	},

        	setLastestProduct(data) {
        		this.latestProducts = data;

        		$('.latest-products').slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					centerPadding: '0px',
					responsive: [
					{
						breakpoint: 1000,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 640,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							centerMode: true,
							slidesToShow: 1
						}
					}]
				}); 
        	},

        	addToCart(product) {
        		this.testCart = product;
        		let url = 'cart/add/' + product.id;
        		axios.post(url)
        		.then(response => this.addToCartSuccess(response.data));
        	},

        	getCart() {
				let url = 'cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.Cart = data
        	},

        	addToCartSuccess(data) {
        		window.event.$emit("cart-add");
        		// this.getCart();
        		// location.reload();
        	},
        },
    }
</script>