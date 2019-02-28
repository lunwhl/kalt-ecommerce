	<template>
		<v-app style="background: #fff;">
			<div class="container">
	            <div class="text-center">
	                <div class="simple-article size-3 uppercase col-xs-b5">shopping cart</div>
	                <div class="h2">check your products</div>
	                <div class="title-underline center"><span></span></div>
	            </div>
        	</div>
        	<div class="container">
	            <table class="cart-table">
	                <thead>
	                    <tr>
	                        <th style="width: 95px;"></th>
	                        <th>product name</th>
	                        <th style="width: 150px;">price</th>
	                        <th style="width: 260px;">quantity</th>
	                        <th style="width: 150px;">installation fee</th>
	                        <th style="width: 150px;">total</th>
	                        <th style="width: 70px;"></th>
	                    </tr>
	                </thead>
	                <tbody v-if="isEmptyCart()">
	                    <tr v-for="cart in carts[0]['cart']">
	                        <td data-title=" ">
	                            <a class="cart-entry-thumbnail" href="#"><img :src="$options.filters.set_image(cart.image_path)" alt=""></a>
	                        </td>
	                        <td data-title=" ">
	                        	<h6 class="h6"><a href="#">{{cart.name}}</a></h6>
	                        	<h6 class="h6" style="color: #164681;">{{cart.options.model}}</h6>
	                        	<div class="d-flex">
	                        		<label style="flex: 0 !important; margin-top: 3px; margin-right: 8px;">Installation: </label>
		                        	<select v-model="cart.options['installationLabel']" @change="changeInstallation(cart)" style="border:1px solid #ebebeb; padding:2px 10px;margin-right:8px;">
		                        		<option value="none">No</option>
		                        		<option value="Basic">Basic</option>
		                        		<option value="Economy">Economy</option>
		                        	</select>
		                        	<v-tooltip bottom v-if="cart.options['installation'] == 'Economy'" tag="div">
										<template slot="activator">
											<div class="tooltip-extend" style="cursor: pointer;">?</div>
										</template>
										<h4 class="h4" style="color: white; text-shadow: 1px 1px #000;">Economy Installation</h4>
					                	<div style="color: white; text-shadow: 1px 1px #000;">*Designed for whichever have no copper piping installed.</div>
					                	<ul  style="color: white; text-shadow: 1px 1px #000;">
					                		<li>Up to 10ft 0.61mm thickness copper piping</li>
					                		<li>Up to 10ft 1/2” thickness premium rubber density insulation</li>
					                		<li>Up to 10ft 1/2” thickness PVC drainage piping towards the nearest drainage point</li>
					                		<li>Up to 10ft 100% copper wiring cable</li>
					                		<ul>
					                			<li>1.0hp & 1.5hp Air Cond - 3 core 1.5mm</li>
					                			<li>1.75hp & above - 4 core 2.5mm</li>
					                		</ul>
					                		<li>Electrical wiring interconnecting indoor & outdoor</li>
					                		<li>Sturdy Air Cond Bracket</li>
					                		<li>Labour charge and tool</li>
					                		<li>Vacuum to the system</li>
					                		<li>Check refrigerant gas pressure</li>
					                		<li>Refill in refrigerant gas</li>
					                		<li>Testing and commissioning of the unit</li>
						                	<li>** If the location of outdoor unit is not easily accessible for installation (eg. apartments / higher grounds), there will be extra charges imposed</li>
					                	</ul>
									</v-tooltip>
									<v-tooltip bottom v-if="cart.options['installation'] == 'Basic'" tag="div">
										<template slot="activator">
											<div class="tooltip-extend" style="cursor: pointer;">?</div>
										</template>
										<h4 class="h4" style="color: white; text-shadow: 1px 1px #000;">Basic Installation</h4>
						                	<div style="color: white; text-shadow: 1px 1px #000;">*Designed for whichever have copper piping installed.</div>
						                	<ul style="color: white; text-shadow: 1px 1px #000;">
						                		<li>No copper piping</li>
						                		<li>No premium rubber density insulation</li>
						                		<li>No PVC drainage piping</li>
						                		<li>No wiring cable</li>
						                		<li>Sturdy Air Cond Bracket</li>
						                		<li>Labour charge and tool</li>
						                		<li>Vacuum to the system</li>
						                		<li>Check refrigerant gas pressure</li>
						                		<li>Refill in refrigerant gas</li>
						                		<li>Testing and commissioning of the unit</li>
						                		<li>** If the location of outdoor unit is not easily accessible for installation (eg. apartments / higher grounds), there will be extra charges imposed</li>
						                	</ul>
									</v-tooltip>
	                        	</div>
	                        	<div style="color: red;font-size: 11px;" v-if="checkInstallation(cart)">Selected installation is not available for this product.</div>
	                        </td>
	                        <td data-title="Price: ">RM {{cart.price}}</td>
	                        <td data-title="Quantity: ">
	                            <div class="quantity-select">
	                                <span class="minus" @click="minusQty(cart)"></span>
	                                <span class="number">{{cart.qty}}</span>
	                                <span class="plus" @click="addQty(cart)"></span>
	                            </div>
	                        </td>
	                        <td data-title="Total:">RM {{cart['options']['installationPrice'] * cart.qty}}</td>
	                        <td data-title="Total:">RM {{cart['options']['productTotalPrice'] * cart.qty}}</td>
	                        <td data-title="">
	                            <div @click="deleteCart(cart)" class="button-close"></div>
	                        </td>
	                    </tr>
	                </tbody>
	                <tbody v-else>
		                <tr>
	                    	<td colspan="6">
	                    		<span class="simple-article size-3 uppercase col-xs-b5">Your cart is currently empty. Please click <a href="/shop">here</a> to shop.</span>
	                    	</td>
	                    </tr>
	                </tbody>
	            </table>
            	<div class="empty-space col-xs-b35"></div>
	            <div class="row" v-if="isEmptyCart()">
	                <div class="col-sm-8 col-md-8 col-xs-b10 col-sm-b0 simple-article size-3">
	                	<label class="checkbox-entry">
	                        <input type="checkbox" v-model="policyCheck"><span style="font-size:14px;">I hereby agree to the </span>
	                    </label>
	                    <label class="checkbox-entry">
		                    <a v-on:click.stop @click="tosModal">TERMS AND CONDITION</a>
		                </label>
	                    <!-- <label class="checkbox-entry">
	                        <input type="checkbox" v-model="accessibleCheck"><span>I declare that the location of outdoor unit is easily accessible for installation</span>
	                    </label> -->
	                </div>
	                <div class="col-sm-4 col-md-4 col-sm-text-right">
	                    <div class="buttons-wrapper">
	                        <a class="button size-2 style-2" @click="updateToCart">
	                            <span class="button-wrapper">
	                                <span class="icon"><img src="css/exzo/img/icon-2.png" alt=""></span>
	                                <span class="text">update cart</span>
	                            </span>
	                        </a>
	                        <a @click="checkout" class="button size-2 style-3" href="#">
	                            <span class="button-wrapper">
	                                <span class="icon"><img src="css/exzo/img/icon-4.png" alt=""></span>
	                                <span class="text">proceed to checkout</span>
	                            </span>
	                        </a>
	                    </div>
	                </div>
	            </div>
            	<div class="empty-space col-xs-b35 col-md-b70"></div>
            	<div class="row" v-if="isEmptyCart()">
	                <div class="col-md-6 col-xs-b50 col-md-b0" >
	                    <h4 class="h4 ">Pick up option</h4>
	                    <div style="color: #888; font-weight: bold; font-size: 17px;">Our Policy<div class="tooltip-extend" style="cursor: pointer; display: inline-block; margin-left: 10px;" @click="deliveryModal">?</div></div>
							<v-radio-group @change="changeRadio" v-model="radios" :mandatory="false">
								<v-radio value="pickup" :disabled="hasInstallation">
									<div class="d-flex" slot="label">
										<div style="margin-right: 10px;">Store Pick Up (Free)</div>
										<v-tooltip right tag="div">
											<template slot="activator">
												<div class="tooltip-extend" style="cursor: pointer;">?</div>
											</template>
											Please bring along the invoice for pick up
										</v-tooltip>
									</div>
								</v-radio>
								<v-radio value="mainland" :disabled="hasInstallation">
									<div class="d-flex" slot="label">
										<div style="margin-right: 10px;">Delivery within Penang Mainland</div>
										<v-tooltip right tag="div">
											<template slot="activator">
												<div class="tooltip-extend" style="cursor: pointer;">?</div>
											</template>
											Multiple floor shipment will have additional charge
										</v-tooltip>
									</div>
								</v-radio>
								<v-radio value="delivery" :disabled="hasInstallation">
									<div class="d-flex" slot="label">
										<div style="margin-right: 10px;">Delivery within Penang Island</div>
										<v-tooltip right tag="div">
											<template slot="activator">
												<div class="tooltip-extend" style="cursor: pointer;">?</div>
											</template>
											Multiple floor shipment will have additional charge
										</v-tooltip>
									</div>
								</v-radio>
								<v-radio value="installation" :disabled="!hasInstallation">
									<div class="d-flex" slot="label">
										<div style="margin-right: 10px;">Delivery with installation</div>
										<v-tooltip right tag="div">
											<template slot="activator">
												<div class="tooltip-extend" style="cursor: pointer;">?</div>
											</template>
											Delivery fee waived with installation
										</v-tooltip>
									</div>
								</v-radio>
							</v-radio-group>
							
	                </div>
	                <div class="col-md-6">
	                    <h4 class="h4">cart totals</h4>
	                    <div class="order-details-entry simple-article size-3 grey-border uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                cart subtotal
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">RM {{subTotal}}</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="order-details-entry simple-article size-3 grey-border uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                shipping and handling
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">{{deliveryTotal}}</div>
	                            </div>
	                        </div>
	                    </div>
	                    <div class="order-details-entry simple-article size-3 grey-border uppercase">
	                        <div class="row">
	                            <div class="col-xs-6">
	                                order total
	                            </div>
	                            <div class="col-xs-6 col-xs-text-right">
	                                <div class="color">RM {{total}}</div>
	                            </div>
	                        </div>
	                    </div>
	                </div>
	            </div>
            	<div class="empty-space col-xs-b35 col-md-b70"></div>
    		</div>
    		<div class="text-xs-center" data-app="true">
		        <div v-if="alert_dialog" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
		        <v-dialog
		          v-model="alert_dialog"
		          width="500"
		        >
		            <v-card>
		                <v-card-title
		                class="headline grey lighten-2"
		                primary-title
		                >
		                <span>{{title}}</span>
		                </v-card-title>

		                <v-card-text>
		                    <div>
		                        <span>{{message}}</span>
		                    </div>
		                </v-card-text>
		            </v-card>
		        </v-dialog>
		    </div>
		    <tos-modal></tos-modal>
		    <dp-modal></dp-modal>
    		<login></login>
    		<v-snackbar v-model="snackbar"
            right="right"
            :timeout="5000"
            top="top"
        >
            {{snackbarMsg}}
        </v-snackbar>
		</v-app>
	</template>
@stop

<script>
	import AlertLogin from '../components/AlertLogin.vue';
	import Login from '../components/Login.vue';
	import TosModal from '../components/TosModal.vue';
	import DpModal from '../components/DeliveryPolicyModal.vue';

    export default {
    	components: {
			AlertLogin,
			TosModal,
			DpModal,
			Login
		},

    	props: ['is_auth'],

    	data() {
    		return {
    			categories: [],
    			carts: [],
    			item: {
    				category: []
    			},
    			url: '',
    			products: [],
    			radios: 'pickup',
    			deliveryNotice: false,
    			policyCheck: false,
    			title: '',
    			message: '',
    			alert_dialog: false,
    			snackbar: false,
                snackbarMsg: '',
                accessibleCheck: true,
    		};
    	},

        mounted() {
            this.getCart();
        },

        methods: {
        	deliveryModal() {
        		window.event.$emit("dpTrigger", {'openDialog': true});
        	},

        	tosModal() {
        		window.event.$emit("tosTrigger", {'openDialog': true});
        	},

        	isEmptyCart(){
        		if(this.carts.length > 0)
        			if(this.carts[0]['cart'] == null || !this.carts[0]['cart'].length > 0)
        				return false;
        			else
        				return true;
        	},

        	checkout() {
        		if(!this.policyCheck){
        			this.title = 'Alert';
        			this.message = 'You must agree with our terms and conditions in order to proceed';
        			this.alert_dialog = true;
        		} else if(!this.accessibleCheck) {
        			this.title = 'Alert';
        			this.message = 'You must declare the location accessibility in order to proceed';
        			this.alert_dialog = true;
        		} else {
					let url = '/api/home/check/auth';
	        		axios.post(url)
	        		.then(response => this.checkoutSuccess(response.data));
	        	}
        	},

        	checkoutSuccess(data)
        	{
        		if(!data['auth']){
        			this.title = 'Please login';
        			this.message = 'You must login to proceed checkout.';
        			this.alert_dialog = true;
        		}
        		else{
					window.location.href = "/checkout?shipping="+this.radios;
        		}
        	},

        	changeRadio() {
        		this.deliveryNotice = this.radios == 'delivery';
        	},

        	checkboxCategory() {
        		Vue.nextTick(()=>{
				    this.getProductForShop();
				}); 
        	},

        	checkInstallation(cart) {
        		if(cart['options']['installationPrice'] == 0 && cart.options['installationLabel'] != 'none') {
        			Vue.set(cart['options'], 'checkInstallation', true);
        			return true;
        		} else {
        			Vue.set(cart['options'], 'checkInstallation', false);
        			return false;
        		}
        	},

        	updateToCart(){
        		this.scrollToTop();
        		_.forEach(this.carts[0]['cart'], function(cart, key) {
        			if(cart['options']['checkInstallation'])
    					cart['options']['installation'] = 'none';
				});
        		let url = '/api/cart/bulk/update';
        		axios.post(url, this.carts)
        		.then(response => this.updateToCartSuccess(response.data));
        	},

        	updateToCartSuccess(data) {
				Vue.nextTick(()=>{
        			if(data['cart'].length > 0)
				    	Vue.set(this.carts, 0, data);
				}); 
				this.triggerSnackbar('Cart updated');
				this.addToCartSuccess(data);
        	},

        	changeInstallation(cart) {
        		axios.post('/api/cart/installation?type=' + cart.options['installationLabel'], {cart: cart, carts: this.carts})
        		.then(response => this.changeInstallationSuccesss(response.data, cart));
        	},

        	changeInstallationSuccesss(data, cart) {
    //     		Vue.nextTick(()=>{
    //     			Vue.set(cart['options'], 'productTotalPrice', data['installationPrice']);
    //     			if(data['installationPrice'] > 0)
    //     				Vue.set(cart['options'], 'installationPrice', data['installationPrice'] - cart.price);
				// });
				this.addToCartSuccess(data);
				this.getCart();
        	},

        	deleteCart(cart){
                let url = '/api/cart/delete/' + cart.rowId;
                axios.post(url)
                .then(response => this.deleteCartSuccess(response.data));
            },

            deleteCartSuccess(data) {
                Vue.nextTick(()=>{
			    	Vue.set(this.carts, 0, data);
				}); 
				this.addToCartSuccess(data);
            },

        	addToCart(product) {
        		let url = '/cart/add/' + product.id;
        		axios.post(url)
        		.then(response => this.addToCartSuccess(response.data));
        	},

        	addToCartSuccess(data) {
        		console.log("success");
        		window.event.$emit("cart-add");
        	},

        	getCart() {
				let url = '/cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
    			if(data['cart'].length > 0)
			    	Vue.set(this.carts, 0, data);
        	},

        	minusQty(cart) {
        		if(cart.qty > 1)
        			cart.qty = parseInt(cart.qty) - 1;
        			axios.post('/api/cart/quantity?qty=' + cart.qty, {cart: cart, carts: this.carts})
        			.then(response => this.addToCartSuccess(response.data));
        	},

        	addQty(cart) {
    			cart.qty = parseInt(cart.qty) + 1;
    			axios.post('/api/cart/quantity?qty=' + cart.qty, {cart: cart, carts: this.carts})
        			.then(response => this.addToCartSuccess(response.data));
        	},

        	scrollToTop() {
                window.scrollTo(0,0);
           },

           triggerSnackbar(message)
            {
                this.snackbarMsg = message;
                this.snackbar = true;
            },
        },

        computed: {
        	deliveryCharge() {
        		if(this.radios == 'delivery')
        			return _.sumBy(this.carts[0].cart, function(item){ return item.qty * 20; });

        		return 0;
        	},

        	subTotal() {
        		let subTotal = 0;

        		if(this.carts.length > 0)
	        		_.forEach(this.carts[0]['cart'], function(cart, key) {
	        			subTotal += cart['options']['productTotalPrice'] * cart['qty'];
					});

				return subTotal;
        	},

        	total() {
        		let total = 0;
        		return this.subTotal + this.deliveryCharge;
        	},

        	deliveryTotal() {
        		return this.deliveryCharge ? 'RM ' + this.deliveryCharge : 'Free';
        	},

        	hasInstallation() {
        		if(this.carts[0] && this.carts[0].cart)
        			return _.findIndex(this.carts[0].cart, function(item){ return item.options.installation != 'none'; }) != -1;

        		return false;
        	}
        },

        watch: {
        	hasInstallation(newVal) {
        		if(newVal && this.radios != 'installation') {
        			this.radios = 'installation';
        		} else if(!newVal && this.radios == 'installation') {
        			this.radios = 'pickup';
        		}
        	}
        }
    }
</script>