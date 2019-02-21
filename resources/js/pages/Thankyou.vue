	<template>
		<v-app style="background: #fff;">
			<div class="container">
	            <div class="text-center">
	                <div class="h2">Thank you</div>
	                <div class="title-underline center"><span></span></div>
	                <h4 class="h4 col-xs-b25">Your payment is made successfully. The list below is your purchase detail.</h4>
	            </div>
        	</div>
			<div class="container">
	            <div class="row">
	                <div class="col-md-12">
	                    <h4 class="h4 col-xs-b25">your purchase</h4>
	                    <div v-for="item in items" class="cart-entry clearfix">
	                        <a class="cart-entry-thumbnail"><img :src="$options.filters.set_image(item.image_path)" style="width:210px" alt=""></a>
	                        <div class="cart-entry-description">
	                            <table>
	                                <tbody>
	                                    <tr>
	                                        <td>
	                                            <div class="h6"><a>{{item.name}}</a></div>
	                                            <div class="simple-article size-3">Installation: {{item.installation_type}}</div>
	                                            <div class="simple-article size-1">QUANTITY: {{item.qty}}</div>
	                                        </td>
	                                        <td>
	                                            <div class="simple-article size-1">RM {{item.price}}</div>
	                                            <div class="simple-article size-1">RM {{item.installation_price}}</div>
	                                            <div class="simple-article size-1">TOTAL: RM {{itemTotal(item)}}</div>
	                                        </td>
	                                    </tr>
	                                </tbody>
	                            </table>
	                        </div>
	                    </div>
	                    <div class="order-details-entry simple-article size-3 uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                Item subtotal
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">RM {{subTotal}}</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="order-details-entry simple-article size-3 uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                shipping and handling
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">{{deliveryTotal}}</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="order-details-entry simple-article size-3 uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                order total
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">RM {{total}}</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div @click="backToHome" class="button block size-2 style-3">
	                        <span class="button-wrapper">
	                            <span class="icon"><img src="/css/exzo/img/icon-4.png" alt=""></span>
	                            <span class="text">Back to home</span>
	                        </span>
	                    </div>
	                </div>
	            </div>
        	</div>
		</v-app>
	</template>
@stop

<script>
    export default {
    	props: ['order'],
    	data() {
    		return {
    			carts: [],
    			items: [],
    		};
    	},

        mounted() {
        	this.items = this.order['items'];
            this.getCart();
        },

        methods: {
        	getCart() {
				let url = '/cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.carts = data;
        	},

        	backToHome() {
        		window.location.href = '/';
        	},

        	itemTotal(product) {
        		return product.qty * product.price;
        	},
        },

        computed: {
        	subTotal() {
        		let subTotal = 0;

        		if(this.items.length > 0)
	        		_.forEach(this.items, function(item, key) {
	        			subTotal += item.price * item.qty;
					});

				return subTotal;
        	},

        	total() {
        		let total = 0;
        		return this.subTotal + (this.order['pickup'] != 'delivery' ? 0 : 20);
        	},

        	deliveryTotal() {
        		return this.order['pickup'] != 'delivery' ? 'No Shipping' : 'RM 20';
        	},

        	
        },
    }
</script>