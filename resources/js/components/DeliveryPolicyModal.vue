<template>
    <div class="text-xs-center" data-app="true">
        <div v-if="aler_dialog" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="aler_dialog"
          width="700"
        >
            <v-card>
                <v-card-title
                class="headline grey lighten-2"
                primary-title
                >
                <span>Delivery Policy</span>
                </v-card-title>

                <v-card-text>
                	<div style="margin-bottom: 15px;">
                        Following are the terms and conditions that constitute our Delivery Policy.
                    </div>
                    <h4 style="margin-bottom: 15px;">Orders processing time</h4>
                    <div style="margin-bottom: 15px;">
                        All orders are proceed within 3-5 working days. Orders are not shipped or delivered on weekends or holidays.
                    </div>
                    <div style="margin-bottom: 15px;">
                        If we are experiencing a high volume of orders, shipments may be delayed by a few days. Please allow additional days in transit for delivery. If there will be a significant delay in shipment of your order, we will contact you via email or telephone. 
                    </div>
                    <h4 style="margin-bottom: 15px;">Shipping method</h4>
                    <div style="margin-bottom: 15px;">
                        All the product will ship by local transporter.
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {
        props:['title', 'message'],
        data () {
            return {
                aler_dialog: false,
            }
        },

        mounted() {
            window.event.$on("dpTrigger", (value) => {
                this.aler_dialog = value['openDialog'];
            });
        },
    }
</script>