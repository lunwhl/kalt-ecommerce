<template>
    <div class="text-xs-center" data-app="true">
        <div v-if="dialog" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="dialog"
          width="500"
        >
            <v-card>
                <v-card-title
                class="headline grey lighten-2"
                primary-title
                >
                <span>Please Login</span>
                </v-card-title>

                <v-card-text>
                    <div>
                        <span>You are required to login in order to proceed to checkout.
                        Please click the login button below to login.</span>
                    </div>
                    <div style="margin-top: 15px;">
                        <a class="button size-2 style-3" href="/login">
                            <span class="button-wrapper">
                                <span class="icon"><img src="css/exzo/img/icon-4.png" alt=""></span>
                                <span class="text">Login</span>
                            </span>
                        </a>
                    </div>
                </v-card-text>
                    
            </v-card>
        </v-dialog>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                dialog: false,
            }
        },

        mounted() {
            window.event.$on("login-dialog", (value) => {
                this.dialog = value['openDialog'];
            });
        },
    }
</script>