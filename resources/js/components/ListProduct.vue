<template>
    <div>
        <ul class="row" style="padding-left: 0px !important;">

        <!-- New Products -->
            <!-- <li v-if="fromHome" class="col-lg-2 col-md-0 col-sm-0"></li> -->
            <li v-for="product in products" :class="colSm" data-wow-delay="0.4s">
                <div v-if="!fromHome" style="margin-top:15px;"></div>
                <div style="border: 2px solid rgb(197, 197, 197); text-align: center;">
                    <h3 style="font-weight: 1000;" class="gotham-bold">{{brandName(product)}}</h3>
                    <div class="product-featured-image" :style="'background-image: url(' + $options.filters.set_image(product.image_path) + ')'"></div>
                    <div><a style="cursor:pointer;" :href="/product/+product.id"><b style="font-size: 17px; color: black;">{{product.name}}</b></a></div>
                    <div style=" margin-top:10px;"><b style="font-size: 20px; color: #223169;">RM {{product.price}}</b></div>
                    <a @click="addToCart(product)" style="color: #223169;" class="btn-shop gotham-book">ADD TO CART</a>
                </div>
                
                <!-- <div class="items-in">  -->
                <!-- Image --> 
                    <!-- <div class="product-featured-image" :style="'background-image: url(' + $options.filters.set_image(product.image_path) + ')'"></div> -->
                    <!-- <img :src="$options.filters.set_image(product.image_path)" alt="">  -->
                    <!-- Hover Details -->
                        <!-- <div class="over-item">
                            <ul class="animated fadeIn" style="padding-left: 0px !important;">
                                <li> <a style="cursor:pointer;" @click="addToCart(product, true)" data-lighter><i class="fa fa-credit-card-alt"></i></a></li>
                                <li> <a style="cursor:pointer;" @click="share(product)"><i class="fa fa-share"></i></a></li>
                                <li> <a style="cursor:pointer;" :href="/product/+product.id"><i class="fa fa-eye"></i></a></li>
                                <li class="full-w"> <a @click="addToCart(product)" class="btn-shop">ADD TO CART</a></li>
                            </ul>
                        </div> -->
                    <!-- Item Name -->
                    <!-- <div class="details-sec"> <a :href="/product/+product.id">{{product.name}}</a> <span class="font-montserrat">RM {{product.price}}</span> </div>
                </div> -->
            </li>
            <!-- <li v-if="fromHome" class="col-lg-2 col-md-0 col-sm-0"></li> -->
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
                let url = '/cart/add/' + product.id;
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
            },

            brandName(product) {
                let brand = _.filter(product.categories, ['type','brand']);
                return brand[0].name;
            },
        },

        computed: {
            colSm: function() {
                return this.fromHome ? "col-lg-3 col-md-3 col-sm-6 animate fadeIn" : "col-lg-4 col-md-4 col-sm-4 animate fadeIn";
            },
            product_class: function() {
                return this.fromHome ? "popurlar_product" : "shop_popurlar_product";
            },
        },
    }
</script>