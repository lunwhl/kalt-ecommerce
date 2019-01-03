<template>
    <div class="text-xs-center">
        <div v-if="dialog" class="share" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="dialog"
          width="800"
        >
            <v-card>
                <v-card-title
                class="headline"
                primary-title
                style="color:#fff; background: #40c7f2;"
                >
                <span>Order {{order['id']}}</span>
                </v-card-title>

                    <v-container grid-list-md>
                        <v-layout row wrap>
                            <v-flex xs6 text-xs-left>
                                <h5>Name: {{order['shipping_first_name']}} {{order['shipping_last_name']}}</h5>
                                <h5>Shipping Address</h5>
                                <span>
                                    <div>{{order['shipping_address']}}, {{order['shipping_city']}},</div>
                                    <div>{{order['shipping_state']}}, {{order['postcode']}}.</div>
                                </span>
                            </v-flex>
                            <v-flex xs6 text-xs-right>
                                <h5>Subtotal: {{order['subtotal']}}</h5>
                                <h5 v-if="order['shipping_price']">Shipping Price: {{order['shipping_price']}}</h5>
                                <h5>Total: {{order['total']}}</h5>
                                <h5>Status: {{order['status']}}</h5>
                                <h5 v-if="order['note']">Note: {{order['note']}}</h5>
                            </v-flex>
                        </v-layout>
                        <v-divider></v-divider>
                        <v-layout row wrap>
                            <v-flex xs12 text-xs-center>
                                <h4>Items</h4>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <v-container style="padding: 0px 24px 24px 24px !important;" grid-list-md v-for="(item, key) in order['items']" :key="key">
                        <v-layout row wrap text-xs-left>
                            <v-flex xs6>
                                <img style="width:150px;" :src="$options.filters.set_image(item.image_path)" />
                            </v-flex>
                            <v-flex xs6>                                
                                <div><b>Name: {{item.name}}</b></div>
                                <div><b>Price: </b><span>RM {{item.price}}</span></div>
                                <div><b>Installation Type: </b><span>{{item.installation_type}}</span></div>
                                <div><b>Installation Price: </b><span>RM {{item.installation_price}}</span></div>
                                <div><b>Quantity: </b><span>{{item.qty}}</span></div>
                            </v-flex>
                        </v-layout>
                        <v-divider></v-divider>
                    </v-container>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        data () {
            return {
                dialog: false,
                order: [],
            }
        },

        mounted() {
            window.event.$on("order-dialog", (value) => {
                this.dialog = value['openDialog'];
                this.order = value['order'];
            });
        },

        methods: {
        },
    }
</script>