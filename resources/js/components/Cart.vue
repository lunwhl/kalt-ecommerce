<template>
	<div class="cart-div">
		<ul class="cart">
			<li>
                <img src="/images/cart.png" class="cart-label" aria-hidden="true" style="width: 24px;" />
				<a aria-expanded="true" aria-haspopup="true" data-toggle="dropdown" id="cart" class="btn btn-cart desktop-menu dropdown-toggle" title="Add To Cart" href="/cart">
					
					<h3 class="dark-blue-bold cart-label">Shop Cart</h3>
					<h5 class="dark-blue-normal">{{numberOfItemInCart}} Item - <span>RM{{totalPriceInCart}}</span></h5>
				</a>
                <a id="cart" class="btn btn-cart mobile-menu" href="/cart">
                    <h5 class="dark-blue-normal">{{numberOfItemInCart}} Item - <span>RM{{totalPriceInCart}}</span></h5>
                </a>
				<ul class="dropdown-menu no-padding">
                    <table>
                        <tr v-if="carts" v-for="cart in carts['cart']">
                            <td style="width: 20px;text-align: center;">
                                <a title="Remove this item" class="remove" style="cursor: pointer; color:#164681;" @click="deleteCart(cart)">&#215;</a>
                            </td>
                            <td>
                                <a :href="productUrl(cart)" class="shop-thumbnail">
                                    <img width="60" height="60" alt="poster_2_up" class="attachment-shop_thumbnail" :src="$options.filters.set_image(cart.image_path)" />
                                </a>
                            </td>
                            <td style="text-align: center;">
                                <a :href="productUrl(cart)" class="shop-thumbnail">
                                    <label style="color: #164681;">{{cart.name}}</label>
                                </a>
                            </td>
                            <td style="padding-bottom: 5px; width: 20px;text-align: center;">
                                <span>X</span>
                            </td>
                            <td style="padding-bottom: 5px; width: 10px;text-align: center;">
                                <span class="quantity">{{cart.qty}}</span>
                            </td>
                        </tr>
                    </table>
                    <!-- <div class="container row" v-if="carts" v-for="cart in carts['cart']">
                        <a title="Remove this item" class="remove" style="cursor: pointer; color:#164681;" @click="deleteCart(cart)">&#215;</a>
                        <a :href="productUrl(cart)" class="shop-thumbnail">
                            <img width="60" height="60" alt="poster_2_up" class="attachment-shop_thumbnail" :src="$options.filters.set_image(cart.image_path)" /><label style="color: #164681;">{{cart.name}} &#215;</label>
                        </a>
                        <span class="quantity">{{cart.qty}} &#215;<span class="amount">RM{{totalPriceOfProduct(cart)}}</span></span>
                    </div> -->
					<!-- <li v-if="carts" v-for="cart in carts['cart']" class="mini_cart_item">
						<a title="Remove this item" class="remove" style="cursor: pointer;" @click="deleteCart(cart)">&#215;</a>
						<a :href="productUrl(cart)" class="shop-thumbnail">
							<img width="60" height="60" alt="poster_2_up" class="attachment-shop_thumbnail" :src="$options.filters.set_image(cart.image_path)" />{{cart.name}} &#215;
						</a>
						<span class="quantity">{{cart.qty}} &#215; <span class="amount">RM{{totalPriceOfProduct(cart)}}</span></span>
					</li> -->
					<li class="cart-button">
						<a href="/cart" title="View Cart">View Cart</a>
						<a href="/cart" title="Check Out">Check out</a>
					</li>
				</ul>
			</li>
		</ul>
	</div>
</template>

<script>
    export default {
    	data() {
    		return {
    			isLoading: true,
    			latestProducts: [],
    			testCart: [],
    			carts: [],
    		};
    	},

        mounted() {
        	window.event.$on("cart-add", () => {
        		this.getCart();
        	});
        	this.getCart();
         //    this.getLatestProduct();
        },

        methods: {   
            productUrl(cart){
                return '/product/' + cart.id;
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
        		this.getCart();
        	},

        	totalPriceOfProduct(cart){
        		let $total = 0;
        		$total = cart.price * parseInt(cart.qty);
				return $total;
        	},

            deleteCart(cart){
                let url = '/api/cart/delete/' + cart.rowId;
                axios.post(url)
                .then(response => this.deleteCartSuccess(response.data));
            },

            deleteCartSuccess(data) {
                this.carts = data;
            },
        },

        computed:{
        	numberOfItemInCart(){
        		let $total = 0;
        		_.each(this.carts['cart'], function (cart) {
					$total += parseInt(cart.qty);
				});
				return $total;
        	},

        	totalPriceInCart(){
        		let $total = 0;
        		_.each(this.carts['cart'], function (cart) {
					$total += cart.qty * cart.price;
				});
				return $total;
        	},

        	
        },
    }
</script>