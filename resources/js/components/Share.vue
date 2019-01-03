<template>
    <div class="text-xs-center">
        <div v-if="dialog" class="share" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="dialog"
          width="400"
        >
            <v-card>
                <!-- <v-card-title
                class="headline grey lighten-2"
                primary-title
                >
                <span>Share <b>{{product.name}}</b> by</span>
                </v-card-title> -->

                <v-card-text>
                    <div class="row text-xs-center">
                        <div class="col-sm-12">
                            <div class="h4">Share</div>
                        </div>
                    </div>
                    <div class="row text-xs-center">
                        <div class="col-sm-12">
                            <div class="follow light">
                                <a class="entry" :href="facebookSharerUrl(product)"><i class="fa fa-facebook"></i></a>
                                <a class="entry" :href="whatsappShareUrl(product)"><i class="fa fa-whatsapp"></i></a>
                                <a class="entry" :href="'/api/home/download/'+product.id"><i class="fa fa-download"></i></a>
                                <a class="entry" @click="doCopy(product)"><i class="fa fa-clone"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- <ul style="text-align:center; list-style:none; padding-left:0px;">
                        <div class="row">
                            <li class="col-sm-6 animate fadeIn" data-wow-delay="0.4s"><a href="whatsapp://send?text=The%text%to%share" data-action="share/whatsapp/share"><v-tooltip bottom><img slot="activator" style="width:48px;" src="/images/whatsapp.png" /><span>Whatsapp</span></v-tooltip></a></li>
                            <li class="col-sm-6 animate fadeIn" data-wow-delay="0.4s"><a :href="facebookSharerUrl(product)"><v-tooltip bottom><img slot="activator" style="width:48px;" src="/images/facebook.png" /><span>Facebook</span></v-tooltip></a></li>
                        </div>
                        <v-divider></v-divider>
                        <div class="row">
                            <li class="col-sm-6 animate fadeIn" data-wow-delay="0.4s"><a :href="'/api/home/download/'+product.id"><v-tooltip bottom><img slot="activator" style="width:48px;" src="/images/download.png" /><span>Download Image</span></v-tooltip></a></li>
                            <li style="cursor:pointer;" class="col-sm-6 animate fadeIn" data-wow-delay="0.4s"><v-tooltip bottom><img @click="doCopy(product)" slot="activator" style="width:48px;" src="/images/link.png" /><span>Get Product Link</span></v-tooltip></li>
                        </div>
                    </ul> -->
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    import VueClipboard from 'vue-clipboard2';
    Vue.use(VueClipboard);

    export default {
        data () {
            return {
                dialog: false,
                product: [],
            }
        },

        mounted() {
            window.event.$on("share-dialog", (value) => {
                this.dialog = value['openDialog'];
                this.product = value['product'];
            });
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
                let productName = product.name.replace(" ", "%");
                return "whatsapp://send?text=" +window.location.origin + '/product/' + product.id + "&t=" + productName;
            }
        },
    }
</script>