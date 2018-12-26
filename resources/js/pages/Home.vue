
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

			<!-- Subscribe Section -->
			<div class="subscribe-section container-fluid no-padding">
				<div class="container">
					<div class="section-header">
						<h3 style="color:white;">About Us</h3>
					</div>
					<div class="subscribe-content">
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed cursus metus. Curabitur sollicitudin volutpat orci, eget semper lorem sodales vel. Donec et augue at leo convallis consequat. In hac habitasse platea dictumst. Nullam rutrum, urna sed ullamcorper viverra, orci erat tempus risus, at pharetra quam nunc in diam. Donec venenatis ex et augue porta, in feugiat nunc interdum. Mauris viverra finibus consectetur. Vestibulum interdum nulla eros, ac feugiat urna pulvinar sed. Fusce ut odio nec metus malesuada ullamcorper consectetur non orci. Aenean dictum libero risus, non mollis lectus malesuada pretium.</p>

					</div>
				</div>
			</div><!-- Subscribe Section /- -->

			<!-- Our Product -->
			
			<div class="latest-product our-products container-fluid no-padding woocommerce">
				<div class="col-sm-12 animate fadeInUp" data-wow-delay="0.2s">
					<div class="padding-top-75"></div>
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

						<div class="padding-top-75"></div>

						<ul id="filters" class="products-categories no-left-padding">
							<li id="latest"><a class="product-link" href="javascript:void(0)">Hot Selling Products</a></li>
						</ul>

						<ListProduct :products="latestProducts" :fromHome="true"></ListProduct>
					</div><!-- Container /- -->
				</div><!-- Our Product /- -->
			</div>

			<div class="subscribe-section container-fluid no-padding">
				<div class="container">
					<div class="section-header">
						<h3 style="color:white;">FAQ</h3>
					</div>
					<div class="subscribe-content">
						<div class="col-md-12">
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed cursus metus. Curabitur sollicitudin volutpat orci, eget semper lorem sodales vel. Donec et augue at leo convallis consequat. In hac habitasse platea dictumst. Nullam rutrum, urna sed ullamcorper viverra, orci erat tempus risus, at pharetra quam nunc in diam. Donec venenatis ex et augue porta, in feugiat nunc interdum. Mauris viverra finibus consectetur. Vestibulum interdum nulla eros, ac feugiat urna pulvinar sed. Fusce ut odio nec metus malesuada ullamcorper consectetur non orci. Aenean dictum libero risus, non mollis lectus malesuada pretium.</p>
							</div>
							<div class="col-md-6">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer sed cursus metus. Curabitur sollicitudin volutpat orci, eget semper lorem sodales vel. Donec et augue at leo convallis consequat. In hac habitasse platea dictumst. Nullam rutrum, urna sed ullamcorper viverra, orci erat tempus risus, at pharetra quam nunc in diam. Donec venenatis ex et augue porta, in feugiat nunc interdum. Mauris viverra finibus consectetur. Vestibulum interdum nulla eros, ac feugiat urna pulvinar sed. Fusce ut odio nec metus malesuada ullamcorper consectetur non orci. Aenean dictum libero risus, non mollis lectus malesuada pretium.</p>
							</div>
						</div>
					</div>
				</div>
			</div><!-- Subscribe Section /- -->

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