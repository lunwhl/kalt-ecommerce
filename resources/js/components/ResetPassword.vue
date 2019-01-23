<template>
    <div class="text-xs-center">
        <loading></loading>
        <div v-if="dialog" class="share" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="dialog"
          width="400"
        >  
            <v-card>
                <v-card-title style="color:#fff; background: #40c7f2;">
                    <v-layout row>
                      <v-flex xs12 text-xs-center>
                          <h3>Reset Password</h3>
                      </v-flex>
                    </v-layout>
                </v-card-title>
                <v-card-text>
                    <v-text-field v-model="form.email"
                                    :rules="[rules.email]"
                                    :error-messages="emailError"
                                    v-on:keyup.enter="submitReset"
                                    label="E-mail">     
                    </v-text-field>
                    <div class="text-xs-center d-flex align-center">
                        <v-btn class="align-center" :disabled="isEmailInvalid" @click="submitReset" color="info">Reset</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
        <alert-login title="Activate Account" message="You are required to activate your account through your email."></alert-login>
    </div>

</template>

<script>
    import AlertLogin from '../components/AlertLogin.vue';
    import Loading from '../components/Loading.vue';
    export default {
        components: {
            AlertLogin,
            Loading
        },

        data () {
            return {
                dialog: false,
                form: new Form ({
                    email: '',
                }),
                rules: {
                  email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                  }
                },
                emailError: '',
            }
        },

        mounted() {
            window.event.$on("reset-dialog", (value) => {
                this.dialog = value['openDialog'];
            });
        },

        methods: {
            submitReset(){
                window.event.$emit("loading", {'openDialog': true});
                this.form.post('/reset', this.form)
                        .then(response => this.submitResetSuccess(response))
            },

            submitResetSuccess(data){
                if(!data.result){
                    window.event.$emit("loading", {'openDialog': false});
                    this.emailError = 'Email does not exist';
                    this.form.email = data.email;
                } else {
                    this.dialog = false;
                    window.event.$emit("loading", {'openDialog': false});
                    // location.pathname == '/cart' ? window.location.href = '/cart' : window.location.href = window.location.href;
                }
            },
        },

        computed: {
            isEmailInvalid() {
                const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
                return !pattern.test(this.form.email);
            },
        },
    }
</script>