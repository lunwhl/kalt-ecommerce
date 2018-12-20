	<template>
		<div>
			<div class="container">
	            <div class="text-center">
	                <div class="h2">Product Details</div>
	                <div class="title-underline center"><span></span></div>
	            </div>
        	</div>
			<div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <div class="row">
	                        <div class="col-sm-6 col-xs-b30 col-sm-b0">
	                            <div class="main-product-slider-wrapper swipers-couple-wrapper">
	                                <div class="swiper-container swiper-control-top">
	                                   <div class="swiper-button-prev hidden"></div>
	                                   <div class="swiper-button-next hidden"></div>
	                                   <div class="swiper-wrapper">
	                                       <div class="swiper-slide">
	                                            <div class="swiper-lazy-preloader"></div>
	                                            <div class="product-big-preview-entry swiper-lazy" :data-background="$options.filters.set_image(selectedProduct.image_path)"></div>
	                                       </div>
	                                   </div>
	                                </div>

	                                <!-- <div class="empty-space col-xs-b30 col-sm-b60"></div> -->

	                                <!-- <div class="swiper-container swiper-control-bottom" data-breakpoints="1" data-xs-slides="3" data-sm-slides="3" data-md-slides="4" data-lt-slides="4" data-slides-per-view="5" data-center="1" data-click="1">
	                                   <div class="swiper-button-prev hidden"></div>
	                                   <div class="swiper-button-next hidden"></div>
	                                   <div class="swiper-wrapper">
	                                       <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-4_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-5_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-6_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-7_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-8_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-9_.jpg" alt="" />
	                                            </div>
	                                        </div>
	                                        <div class="swiper-slide">
	                                            <div class="product-small-preview-entry">
	                                                <img src="css/exzo/img/product-preview-10_.jpg" alt="" />
	                                            </div>
	                                       </div>

	                                   </div>
	                                </div> -->
	                            </div>

	                        </div>
	                        <div v-if="selectedBrandType" class="col-sm-6">
	                            <div class="simple-article size-3 col-xs-b5">{{getBrand}}</div>
	                            <div class="h3 col-xs-b25">{{selectedProduct.name}}</div>
	                            <div class="row col-xs-b25">
	                                <div class="col-sm-6">
	                                    <div class="simple-article size-5">PRICE: <span class="color">RM {{selectedProduct.price}}</span></div>        
	                                </div>
	                            </div>
	                            <div class="row">
	                                <div class="col-sm-6">
	                                    <div class="simple-article size-3 col-xs-b5">ITEM NO.: <span>127-#5238</span></div>
	                                </div>
	                            </div>
	                            <div class="simple-article size-3 col-xs-b30" v-html="selectedProduct.description"></div>
	                            <div class="row col-xs-b40">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-1">quantity:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div class="quantity-select">
	                                        <span class="minus" @click="minusQty"></span>
	                                        <span class="number">{{qty}}</span>
	                                        <span class="plus" @click="addQty"></span>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row m5 col-xs-b40">
	                                <div class="col-sm-12 col-xs-b12 col-sm-b12">
	                                    <a class="button size-2 style-2 block" @click="addToCart(selectedProduct)">
	                                        <span class="button-wrapper">
	                                            <span class="icon"><img src="/css/exzo/img/icon-2.png" alt=""></span>
	                                            <span class="text">add to cart</span>
	                                        </span>
	                                    </a>
	                                </div>
	                            </div>
	                            <!-- <div class="row">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-2">share:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div class="follow light">
	                                        <a class="entry" href="#"><i class="fa fa-facebook"></i></a>
	                                        <a class="entry" href="#"><i class="fa fa-twitter"></i></a>
	                                        <a class="entry" href="#"><i class="fa fa-linkedin"></i></a>
	                                        <a class="entry" href="#"><i class="fa fa-google-plus"></i></a>
	                                        <a class="entry" href="#"><i class="fa fa-pinterest-p"></i></a>
	                                    </div>
	                                </div>
	                            </div> -->
	                        </div>
	                    </div>
	                </div>
	            </div>
        	</div>
			<v-snackbar v-model="snackbar"
				right="right"
				:timeout="timeout"
				top="top"
			>
			{{snackbarMsg}}
			</v-snackbar>
		</div>
	</template>
@stop

<script>
    export default {
    	props: ['product'],
    	data() {
    		return {
    			selectedBrandType: [],
    			carts: [],
    			selectedProduct: [],
    			qty: 1,
    			snackbar: false,
    			snackbarMsg: '',
    			timeout: 2000,
    		};
    	},

        mounted() {
        	this.selectedProduct = this.product;
        	this.selectBrand();
            this.getCart();
        },

        methods: {
        	selectBrand() {
        		this.selectedBrandType = _.filter(this.selectedProduct['type'], ['type', 'brand']);
        	},

        	addToCart(product) {
        		let url = '/cart/add/' + product.id + '?qty=' + this.qty;
        		axios.post(url)
        		.then(response => this.addToCartSuccess(response.data));
        	},

        	getCart() {
				let url = '/cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.carts = data;
        	},

        	addToCartSuccess(data) {
        		this.triggerSnackbar(this.selectedProduct.name + ' added into cart');
        		window.event.$emit("cart-add");
        	},

        	minusQty() {
        		if(this.qty > 1)
        			this.qty = this.qty - 1;
        	},

        	addQty() {
    			this.qty = this.qty + 1;
        	},

        	scrollToTop() {
                window.scrollTo(0,0);
			},

			triggerSnackbar(message)
			{
				this.snackbarMsg = message;
				this.snackbar = true;
			}
        },

        computed: {
        	getBrand: function() {
        		if(this.selectedBrandType.length > 0){
        			let brand = _.filter(this.selectedProduct['type'], ['type', 'brand']);
        		
        			return brand[0]['name'];
        		}
    		}
        },
    }
</script>