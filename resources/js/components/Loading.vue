<template>
    <div class="text-xs-center" v-if="loading">
        <div v-if="loading" style="z-index: 999;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-progress-circular
          indeterminate
          color="primary"
          style="position: fixed; top: 50%; z-index: 999;"
        ></v-progress-circular>
    </div>
</template>

<script>
    export default {

        data () {
            return {
                loading: false,
            }
        },

        mounted() {
            window.event.$on("loading", (value) => {
                this.loading = value['openDialog'];
            });
        },
    }
</script>