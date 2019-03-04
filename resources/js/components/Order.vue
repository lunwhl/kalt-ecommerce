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

                    <v-container fluid>
                        <v-layout style="padding: 0px 10px;">
                            <v-flex xs4 text-xs-left>
                                <h4>Biller Information</h4>
                                <h5>Name: {{order['billing_name']}}</h5>
                                <h5>Company name: {{order['billing_company_name']}}</h5>
                                <h5>Address</h5>
                                <span>
                                    <div>{{order['billing_address']}}, {{order['billing_city']}},</div>
                                    <div>{{order['billing_state']}}, {{order['billing_postcode']}}.</div>
                                </span>
                                <h5>Phone: {{order['billing_phone']}}</h5>
                            </v-flex>
                            <v-flex xs4 text-xs-left>
                                <h4>Shipment Information</h4>
                                <h5>Name: {{order['shipping_name']}}</h5>
                                <h5>Company name: {{order['shipping_company_name']}}</h5>
                                <h5>Address</h5>
                                <span>
                                    <div>{{order['shipping_address']}}, {{order['shipping_city']}},</div>
                                    <div>{{order['shipping_state']}}, {{order['shipping_postcode']}}.</div>
                                </span>
                                <h5>Phone: {{order['shipping_phone']}}</h5>
                            </v-flex>
                            <v-flex xs4 text-xs-left>
                                <h4>Billing Information</h4>
                                <h5>Subtotal: {{order['subtotal']}}</h5>
                                <h5 v-if="order['shipping_price']">Shipping Price: {{order['shipping_price']}}</h5>
                                <h5>Total: {{order['total']}}</h5>
                                <h5>Status: {{order['status']}}</h5>
                                <h5 v-if="order['note']">Note: {{order['note']}}</h5>
                                <h5>Pickup Option: {{this.order.pickup}}</h5>
                            </v-flex>
                        </v-layout>
                        <v-divider></v-divider>
                        <v-layout>
                            <v-flex xs12 text-xs-center>
                                <h4>Items</h4>
                            </v-flex>
                        </v-layout>
                    </v-container>
                    <v-container fluid style="padding: 0px 24px 24px 24px !important;" v-for="(item, key) in order['items']" :key="key">
                        <v-layout text-xs-left>
                            <v-flex xs6>
                                <img style="width:150px;" :src="$options.filters.set_image(item.image_path)" />
                            </v-flex>
                            <v-flex xs6>                                
                                <div><b>Name: {{item.name}}</b></div>
                                <div><b>Model: {{item.model}}</b></div>
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

        computed: {
            pickupOption() {
                if(this.order.pickup == 'mainland')
                    return 'Delivery within Penang Mainland';

                if(this.order.pickup == 'pickup')
                    return 'Store Pick Up';

                if(this.order.pickup == 'delivery')
                    return 'Delivery within Penang Island';

                if(this.order.pickup == 'installation')
                    return 'Delivery with installation';
            }
        },
    }
</script>