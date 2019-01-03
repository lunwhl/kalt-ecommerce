	<template>
		<div data-app="true">
			<div class="container">
	            <div class="text-center">
	                <div class="simple-article size-3 uppercase col-xs-b5">checkout</div>
	                <div class="h2">check your info</div>
	                <div class="title-underline center"><span></span></div>
	            </div>
        	</div>

        	<div class="container">
        		<form>
		            <div class="row">
		                <div class="col-md-6 col-xs-b50 col-md-b0">
		                    <h4 class="h4 col-xs-b25">billing details</h4>
		                    <div class="row m10">
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_first_name" type="text" value="" placeholder="First name*" />
		                            <span class="text-danger" v-if="form.errors.has('billing_first_name')">{{ form.errors.get('billing_first_name') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_last_name" type="text" value="" placeholder="Last name*" />
		                            <span class="text-danger" v-if="form.errors.has('billing_last_name')">{{ form.errors.get('billing_last_name') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <input class="simple-input" v-model="form.billing_company_name" type="text" value="" placeholder="Company name" />
		                    <span class="text-danger" v-if="form.errors.has('billing_company_name')">{{ form.errors.get('billing_company_name') }}</span>
		                    <div class="empty-space col-xs-b20"></div>
		                    <input class="simple-input" v-model="form.billing_address" type="text" value="" placeholder="Address*" />
		                    <span class="text-danger" v-if="form.errors.has('billing_address')">{{ form.errors.get('billing_address') }}</span>
		                    <div class="empty-space col-xs-b20"></div>
	                        <input class="simple-input" v-model="form.billing_city" type="text" value="" placeholder="City*" />
		                    <span class="text-danger" v-if="form.errors.has('billing_city')">{{ form.errors.get('billing_city') }}</span>
	                        <div class="empty-space col-xs-b20"></div>
		                    <div class="row m10">
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_state" type="text" value="" placeholder="State*" />
		                    		<span class="text-danger" v-if="form.errors.has('billing_state')">{{ form.errors.get('billing_state') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_postcode" type="text" value="" placeholder="Postcode*" />
		                    		<span class="text-danger" v-if="form.errors.has('billing_postcode')">{{ form.errors.get('billing_postcode') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <div class="row m10">
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_email" type="text" value="" placeholder="Email*" />
		                    		<span class="text-danger" v-if="form.errors.has('billing_email')">{{ form.errors.get('billing_email') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.billing_phone" type="text" value="" placeholder="Phone*" />
		                    		<span class="text-danger" v-if="form.errors.has('billing_phone')">{{ form.errors.get('billing_phone') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <label class="checkbox-entry">
		                        <input type="checkbox" v-model="policyCheck"><span>Privacy policy agreement</span>
		                    </label>
		                    <div class="empty-space col-xs-b50"></div>
		                    <label class="checkbox-entry">
		                        <input type="checkbox" v-model="form.different_shipping"><span>ship to different address?</span>
		                    </label>
		                    <div v-if="form.different_shipping">
		                        <div class="empty-space col-xs-b25"></div>
		                        <div class="row m10">
		                            <div class="col-sm-6">
		                                <input class="simple-input" v-model="form.shipping_first_name" type="text" value="" placeholder="First name*" />
		                            <span class="text-danger" v-if="form.errors.has('shipping_first_name')">{{ form.errors.get('shipping_first_name') }}</span>
		                                <div class="empty-space col-xs-b20"></div>
		                            </div>
		                            <div class="col-sm-6">
		                                <input class="simple-input" v-model="form.shipping_last_name" type="text" value="" placeholder="Last name*" />
		                            	<span class="text-danger" v-if="form.errors.has('shipping_last_name')">{{ form.errors.get('shipping_last_name') }}</span>
		                                <div class="empty-space col-xs-b20"></div>
		                            </div>
		                        </div>
		                        <input class="simple-input" v-model="form.shipping_company_name" type="text" value="" placeholder="Company name" />
	                        	<span class="text-danger" v-if="form.errors.has('shipping_company_name')">{{ form.errors.get('shipping_company_name') }}</span>
		                        <div class="empty-space col-xs-b20"></div>
		                        <input class="simple-input" v-model="form.shipping_address" type="text" value="" placeholder="Address*" />
	                        	<span class="text-danger" v-if="form.errors.has('shipping_address')">{{ form.errors.get('shipping_address') }}</span>
		                        <div class="empty-space col-xs-b20"></div>
	                            <input class="simple-input" v-model="form.shipping_city" type="text" value="" placeholder="City*" />
	                        	<span class="text-danger" v-if="form.errors.has('shipping_city')">{{ form.errors.get('shipping_city') }}</span>
	                            <div class="empty-space col-xs-b20"></div>
		                        <div class="row m10">
		                            <div class="col-sm-6">
		                                <input class="simple-input" v-model="form.shipping_state" type="text" value="" placeholder="State*" />
	                        			<span class="text-danger" v-if="form.errors.has('shipping_state')">{{ form.errors.get('shipping_state') }}</span>
		                                <div class="empty-space col-xs-b20"></div>
		                            </div>
		                            <div class="col-sm-6">
		                                <input class="simple-input" v-model="form.shipping_postcode" type="text" value="" placeholder="Postcode*" />
	                        			<span class="text-danger" v-if="form.errors.has('shipping_postcode')">{{ form.errors.get('shipping_postcode') }}</span>
		                                <div class="empty-space col-xs-b20"></div>
		                            </div>
		                        </div>
		                    </div>
		                    <div class="empty-space col-xs-b30 col-sm-b60"></div>
		                    <textarea class="simple-input" v-model="form.note" placeholder="Note about your order"></textarea>
		                </div>
		                <div class="col-md-6">
		                    <h4 class="h4 col-xs-b25">your order</h4>
		                    <div v-for="cart in carts['cart']" class="cart-entry clearfix">
		                        <a class="cart-entry-thumbnail" :href="/product/+cart.id"><img :src="$options.filters.set_image(cart.image_path)" style="width:210px" alt=""></a>
		                        <div class="cart-entry-description">
		                            <table>
		                                <tbody>
		                                    <tr>
		                                        <td>
		                                            <div class="h6"><a :href="/product/+cart.id">{{cart.name}}</a></div>
		                                            <div class="simple-article size-3">Installation: {{cart['options']['installation']}}</div>
		                                            <div class="simple-article size-1">QUANTITY: {{cart.qty}}</div>
		                                        </td>
		                                        <td>
		                                            <div class="simple-article size-1">RM {{cart.price}}</div>
		                                            <div class="simple-article size-1">RM {{cart['options']['installationPrice']}}</div>
		                                            <div class="simple-article size-1">TOTAL: RM {{cart['options']['productTotalPrice'] * cart.qty}}</div>
		                                        </td>
		                                    </tr>
		                                </tbody>
		                            </table>
		                        </div>
		                    </div>
		                    <div class="order-details-entry simple-article size-3 uppercase">
		                        <div class="row">
		                            <div class="col-xs-6">
		                                cart subtotal
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
		                    <div class="empty-space col-xs-b50"></div>
		                    <h4 class="h4 col-xs-b25">payment method</h4>
		                    <div class="simple-article size-2">BillPlz</div>
		                    <div class="empty-space col-xs-b30"></div>
		                    <div @click="submitOrder" class="button block size-2 style-3">
		                        <span class="button-wrapper">
		                            <span class="icon"><img src="css/exzo/img/icon-4.png" alt=""></span>
		                            <span class="text">place order</span>
		                        </span>
		                    </div>
		                </div>
		            </div>
		        </form>
        	</div>
		</div>
	</template>
@stop

<script>
    export default {
    	props: ['shipping'],

    	data() {
    		return {
    			carts: [],
    			deliveryCharge: '',
    			form : new Form ({
				    billing_first_name: '',
				    billing_last_name: '',
				    billing_company_name: '',
				    billing_address: '',
				    billing_city: '',
				    billing_state: '',
				    billing_postcode: '',
				    billing_email: '',
				    billing_phone: '',
				    shipping_first_name: '',
				    shipping_last_name: '',
				    shipping_company_name: '',
				    shipping_address: '',
				    shipping_city: '',
				    shipping_state: '',
				    shipping_postcode: '',
				    shipping_email: '',
				    shipping_phone: '',
				    subtotal: '',
				    shipping_price: '',
				    total: '',
				    note: '',
				    different_shipping: false,
				}), 
				policyCheck: false,
    		};
    	},

        mounted() {
            this.getCart();
            this.deliveryCharge = this.shipping;
        },

        methods: {
        	submitOrder() {
        		this.form.subtotal = this.subTotal;
        		this.form.total = this.total;
        		this.form.shipping_price = this.deliveryCharge == 'pickup' ? 0 : 30;
        		console.log(this.form.different_shipping);
        		let url = '/api/order';
        		this.form.post(url, this.form)
        				.then(response => this.submitOrderSuccess(response.data))
        				.catch(error => this.submitOrderError(response.error));
        	},

        	submitOrderSuccess(data) {
        		window.location.href = "/api/order/completed";
        	},

        	submitOrderError(data){
        		console.log(data);
        	},

        	getCart() {
				let url = 'cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.carts = data;
        		Vue.nextTick(()=>{
					if(_.has(this.carts, 'cart'))
		        		if(_.values(this.carts).some(x => x == null) || 
		        			!_.every(this.carts, x => x.length > 0))
		        			window.location.href = "/shop";
				}); 
        	},
        },

        computed: {
        	subTotal() {
        		let subTotal = 0;

        		if(_.has(this.carts, 'cart'))
	        		_.forEach(this.carts['cart'], function(cart, key) {
	        			subTotal += cart['options']['productTotalPrice'] * cart['qty'];
					});

				return subTotal;
        	},

        	total() {
        		let total = 0;
        		return this.subTotal + (this.deliveryCharge == 'pickup' ? 0 : 30);
        	},

        	deliveryTotal() {
        		return this.deliveryCharge == 'pickup' ? 'No Shipping' : 'RM 30';
        	},
        },
    }
</script>