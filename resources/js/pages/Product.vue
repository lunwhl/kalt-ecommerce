	<template>
		<v-app style="background: #fff;">
			<div class="container">
	            <div class="text-center">
	                <div class="h2">Product Details</div>
	                <div class="title-underline center"><span></span></div>
	            </div>
        	</div>
			
            <div class="row">
            	<div class="container">
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
	                             <div class="row col-xs-b40">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-1">MODEL:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div style="margin-top: 10px;">
	                                        <span style="color: black; font-size: 16px;">{{selectedProduct.model}}</span>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row col-xs-b40">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-1">PRICE:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div style="margin-top: 10px;">
	                                        <span style="color: black; font-size: 16px;">RM {{selectedProduct.price}}</span>
	                                    </div>
	                                </div>
	                            </div>
	                            <div class="row col-xs-b40">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-1">Hose Power:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div style="margin-top: 10px;">
	                                        <span style="color: black; font-size: 16px;">{{getHosePower}}</span>
	                                    </div>
	                                </div>
	                            </div>
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
	                            <div class="row">
	                                <div class="col-sm-3">
	                                    <div class="h6 detail-data-title size-2">share:</div>
	                                </div>
	                                <div class="col-sm-9">
	                                    <div class="follow light">
	                                        <a class="entry" :href="facebookSharerUrl(selectedProduct)"><i class="fa fa-facebook"></i></a>
	                                        <a class="entry" href="#"><i class="fa fa-whatsapp"></i></a>
	                                        <!-- <a class="entry" :href="'/api/home/download/'+product.id"><i class="fa fa-download"></i></a> -->
	                                        <a class="entry" @click="doCopy(selectedProduct)"><i class="fa fa-clone"></i></a>
	                                    </div>
	                                </div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
                <div class="col-md-12 left-background" style="margin-top: 40px;">
					<v-tabs
					color="#488dcb"
					dark
					slider-color="#40c7f2"
					centered
					class="container"
					>
						<v-tab
						v-for="tabTitle in tabTitles"
						:key="tabTitle"
						ripple
						>
						{{ tabTitle }}
						</v-tab>
						<v-tab-item
						v-for="tabTitle in tabTitles"
						:key="tabTitle"
						>
							<v-tabs-items v-model="tab">
								<v-tab-item
								:key="tabTitles[0]"
								>
									<div class="row" style="margin-top: 40px;">
				                    	<div class="text-center">
							                <div class="h4">Description</div>
							                <div class="title-underline center"><span></span></div>
							            </div>
							            <div class="text-center">
				                    		<div class="description-width simple-article size-3 col-xs-b30 fr-view" v-html="selectedProduct.description"></div>
				                    	</div>
				                    </div>
								</v-tab-item>
								<v-tab-item
								:key="tabTitles[1]"
								>
									<div class="row" style="margin-top: 40px;">
				                    	<div class="text-center">
							                <div class="h4">Specification</div>
							                <div class="title-underline center"><span></span></div>
							            </div>
							            <div class="text-center">
				                    		<div class="description-width simple-article size-3 col-xs-b30 fr-view d-flex justify-center" v-html="selectedProduct.specification"></div>
				                    	</div>
				                    </div>
								</v-tab-item>
								<v-tab-item
								:key="tabTitles[2]"
								>
									<div class="row" style="margin-top: 40px;">
				                    	<div class="text-center">
							                <div class="h4">Return policy</div>
							                <div class="title-underline center"><span></span></div>
							            </div>
							            <div class="text-left d-flex">
				                    		<div class="description-width simple-article size-3 col-xs-b30 fr-view">
				                    			<p>If you are not entirely satisfied with your purchase, we’re here to help</p>

												<b>Returns</b>
												<ol>
													<li>You have 5 calendar days to return an item from the date you received it. You are required to contact us before returns.</li>
													<li>To be eligible for a return, your item must be unused, and in the same condition that you received it. Your item must be in the original packaging.</li>

													<li>Your item needs to have the receipt or proof of purchase.</li> 

													<li>You need to attend to our warehouse together with the item.</li> 

													<li>Once we received your item, we will inspect it and notify you on the status of your refund after inspecting the item.</li>

													<li>If your return is approved, we will initiate a refund to your account number. You will receive the credit within a certain amount of days.</li>
												</ol> 

				                    		</div>
				                    	</div>
				                    </div>
								</v-tab-item>
							</v-tabs-items>
						</v-tab-item>
					</v-tabs>
                </div>
            </div>

        	<div class="row">
        		<div class="col-md-12" v-if="!relatedProducts['relatedProducts'].length == 0">
	                    <div class="row">
	                    	<div class="text-center" style="margin-top: 40px;">
				                <div class="h4">Related Products</div>
				                <div class="title-underline center"><span></span></div>
				            </div>
				            <div class="container home-product text-center">
	                    		<ListProduct :products="relatedProducts['relatedProducts']" :fromHome="true"></ListProduct>	
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
			<share></share>
			<login></login>
		</v-app>
	</template>
@stop

<script>
	import ListProduct from '../components/ListProduct.vue';
	import Share from '../components/Share.vue';
	import Login from '../components/Login.vue';
	import VueClipboard from 'vue-clipboard2';
    Vue.use(VueClipboard);
    export default {
    	components: {
    		Share,
			Login,
			ListProduct
		},

    	props: ['product'],
    	data() {
    		return {
    			selectedBrandType: [],
    			selectedHosePowerType: [],
    			carts: [],
    			selectedProduct: [],
    			qty: 1,
    			snackbar: false,
    			snackbarMsg: '',
    			timeout: 2000,
    			relatedProducts: {
    				'relatedProducts': [],
    			},
    			tab: null,
    			tabTitles: ['Description', 'Specification', 'Return Policy'],
    		};
    	},

        mounted() {
        	this.selectedProduct = this.product;
        	this.selectBrand();
            this.getCart();
         	window.event.$on("share-to-shop", (value) => {
        		window.event.$emit("share-dialog", {'openDialog': value['openDialog'], 'product': value['product']});
            });
            window.event.$on("copied", () => {
            	this.snackbarMsg = 'Link copied';
        		this.snackbar = true;
        	});
        	this.getRelatedProduct(this.product.id);
        },

        methods: {
        	doCopy: function (product) {
                let url = window.location.origin + '/product/' + product.id;
                this.$copyText(url).then(function (e) {
                        window.event.$emit("copied");
                })
            },

            facebookSharerUrl(product){
                return "https://www.facebook.com/sharer.php?u=" + window.location.origin + '/product/' + product.id + "&t=" + product.name;
            },

            whatsappShareUrl(product){
            	if(product.name){
                	let productName = product.name.replace(" ", "%");
                	return "whatsapp://send?text=" +window.location.origin + '/product/' + product.id + "&t=" + productName;
            	}
            },

            getRelatedProduct(id){
                let url = '/api/product/related?id=' + id;

            	axios.get(url)
        		.then(response => this.getRelatedProductSuccesss(response.data));
            },

            getRelatedProductSuccesss(data){
            	this.relatedProducts = data;
            },

        	selectBrand() {
        		this.selectedBrandType = _.filter(this.selectedProduct['type'], ['type', 'brand']);
        	},

        	selectBrand() {
        		this.selectedHosePowerType = _.filter(this.selectedProduct['type'], ['type', 'brand']);
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
    		},

    		getHosePower: function() {
        		if(this.selectedHosePowerType.length > 0){
        			let brand = _.filter(this.selectedProduct['type'], ['type', 'horsepower']);
        			
        			if(brand.length > 0)
        				return brand[0]['name'];
        			else
        				return "-";
        		}
    		},
        },
    }
</script>