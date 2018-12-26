<template>
    <div class="popurlar_product">
        <ul class="row">

        <!-- New Products -->
            <li v-for="product in products" :class="colSm" data-wow-delay="0.4s">
                <div class="items-in"> 
                <!-- Image --> 
                    <div class="product-featured-image" :style="'background-image: url(' + $options.filters.set_image(product.image_path) + ')'"></div>
                    <!-- <img :src="$options.filters.set_image(product.image_path)" alt="">  -->
                    <!-- Hover Details -->
                        <div class="over-item">
                            <ul class="animated fadeIn" style="padding-left:0px;">
                                <li> <a style="cursor:pointer;" @click="addToCart(product, true)" data-lighter><i class="fa fa-credit-card-alt"></i></a></li>
                                <li> <a style="cursor:pointer;" @click="share(product)"><i class="fa fa-share"></i></a></li>
                                <li> <a style="cursor:pointer;" :href="/product/+product.id"><i class="fa fa-eye"></i></a></li>
                                <li class="full-w"> <a @click="addToCart(product)" class="btn-shop">ADD TO CART</a></li>
                            </ul>
                        </div>
                    <!-- Item Name -->
                    <div class="details-sec"> <a :href="/product/+product.id">{{product.name}}</a> <span class="font-montserrat">RM {{product.price}}</span> </div>
                </div>
            </li>
        </ul>
        <v-snackbar v-model="snackbar"
            right="right"
            :timeout="timeout"
            top="top"
        >
            {{snackbarMsg}}
        </v-snackbar>
    </div>
</template>

<script>
    export default {

        props: ['products', 'fromHome'],

        data () {
            return {
                snackbar: false,
                snackbarMsg: '',
                timeout: 2000,
            }
        },

        mounted() {
        },

        methods: {
            addToCart(product, isBuy = null) {
                let url = 'cart/add/' + product.id;
                axios.post(url)
                .then(response => this.addToCartSuccess(response.data, isBuy, product.name));
            },

            addToCartSuccess(data, isBuy, product) {
                window.event.$emit("cart-add");
                this.triggerSnackbar(product + ' added into cart');
                isBuy ? window.location.href = '/cart' : null;
            },

            share(product) {
                window.event.$emit("share-to-shop", {'openDialog': true, 'product': product});
            },

            triggerSnackbar(message)
            {
                this.snackbarMsg = message;
                this.snackbar = true;
            }
        },

        computed: {
            colSm: function() {
                return this.fromHome ? "col-sm-3 animate fadeIn" : "col-sm-4 animate fadeIn";
            },
        },
    }
</script>