<template>
    <div class="text-xs-center" data-app="true">
        <div v-if="aler_dialog" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="aler_dialog"
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
            window.event.$on("login-alert", (value) => {
                this.aler_dialog = value['openDialog'];
            });
        },
    }
</script>