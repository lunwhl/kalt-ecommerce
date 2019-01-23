<template>
    
    <div class="text-xs-center">
        
        <div v-if="dialog" class="share" style="z-index: 201;background-color: black;height: 100% !important;position: fixed;top: 0;width: 100% !important;opacity: .46;" />
        <v-dialog
          v-model="dialog"
          width="400"
        >  
            <v-card v-if="!isRegister">
                <v-card-title style="color:#fff; background: #40c7f2;">
                    <v-layout row>
                      <v-flex xs12 text-xs-center>
                          <h3>Login</h3>
                      </v-flex>
                    </v-layout>
                </v-card-title>
                <v-card-text>
                    <v-text-field v-if="!isRegister && dialog"
                                    v-model="loginForm.email"
                                    ref="focus"
                                    :error-messages="loginForm.errors.get('email')"
                                    autofocus
                                    label="Email">                    
                    </v-text-field>
                    <v-text-field v-model="loginForm.password"
                                    :error-messages="loginForm.errors.get('password')"
                                    v-on:keyup.enter="submitLogin"
                                    type="password"
                                    label="Password"
                                    class="loginPassword">                    
                    </v-text-field>
                    <span style="color: grey; cursor: pointer;" @click="forgotPassword">Forgot password</span>
                    <span v-if="activateError" style="color: red;">Your account is not activate. Please activate your account through your email.</span>
                    <div class="text-xs-center d-flex align-center">
                        <v-btn class="align-center" @click="submitLogin" color="info">Login</v-btn>
                        <v-btn class="align-center" @click="toRegister" color="info">Register</v-btn>
                    </div>
                </v-card-text>
            </v-card>
            <v-card v-else>
                <v-container style="color:#fff; background: #40c7f2;">
                    <v-layout row>
                      <v-flex style="padding-left: 10px;" xs6 text-xs-left>
                          <h3 class="px-0">Register</h3>
                      </v-flex>
                      <v-flex xs6 text-xs-right>
                            <v-btn @click="toLogin" fab dark small color="indigo">
                                <v-icon style="padding-top:10px;" dark>arrow_back</v-icon>
                            </v-btn>
                      </v-flex>
                    </v-layout>
                </v-container>
                <v-card-text>
                    <v-text-field v-if="isRegister && dialog"
                                    v-model="form.name"
                                    :error-messages="form.errors.get('name')"
                                    ref="focus"
                                    autofocus
                                    label="Name">                    
                    </v-text-field>
                    <v-text-field v-model="form.address"
                                    :error-messages="form.errors.get('address')"
                                    label="Address">                    
                    </v-text-field>
                    <v-text-field v-model="form.city"
                                    :error-messages="form.errors.get('city')"
                                    label="City">                    
                    </v-text-field>
                    <v-text-field v-model="form.state"
                                    :error-messages="form.errors.get('state')"
                                    label="State">                    
                    </v-text-field>
                    <v-text-field v-model="form.postcode"
                                    :error-messages="form.errors.get('postcode')"
                                    label="Postcode">                    
                    </v-text-field>
                    <v-text-field v-model="form.email"
                                    :rules="[rules.email]"
                                    :error-messages="form.errors.get('email')"
                                    label="E-mail">        
                    </v-text-field>
                    <v-text-field v-model="form.phone"
                                    :error-messages="form.errors.get('phone')"
                                    label="Phone">                    
                    </v-text-field>
                    <v-text-field v-model="form.password"
                                    :error-messages="form.errors.get('password')"
                                    type="password"
                                    label="Password">                    
                    </v-text-field>
                    <v-text-field v-model="form.password_confirmation"
                                    :error-messages="validatePassword()"
                                    v-on:keyup.enter="submitRegister"
                                    type="password"
                                    @input="validatePassword"
                                    label="Confirm password">                    
                    </v-text-field>
                    <div class="text-xs-center d-flex align-center">
                        <v-btn class="align-center" @click="dialog = false" color="info">Cancel</v-btn>
                        <v-btn class="align-center" @click="submitRegister" color="info">Register</v-btn>
                    </div>
                </v-card-text>
            </v-card>
        </v-dialog>
        <alert-login title="Activate Account" message="You are required to activate your account through your email."></alert-login>
        <reset-password></reset-password>
    </div>

</template>

<script>
    import AlertLogin from '../components/AlertLogin.vue';
    import ResetPassword from '../components/ResetPassword.vue';
    export default {
        components: {
            AlertLogin,
            ResetPassword
        },

        data () {
            return {
                dialog: false,
                form: new Form ({
                    name: '',
                    address: '',
                    city: '',
                    state: '',
                    postcode: '',
                    email: '',
                    phone: '',
                    password: '',
                    password_confirmation: '',
                }),
                loginForm: new Form ({
                    email: '',
                    password: '',
                }),
                isRegister: false,
                activateError: false,
                rules: {
                  email: value => {
                    const pattern = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
                    return pattern.test(value) || 'Invalid e-mail.'
                  }
                }
            }
        },

        mounted() {
            window.event.$on("login-dialog", (value) => {
                this.dialog = value['openDialog'];
            });
        },

        methods: {
            forgotPassword() {
                window.event.$emit("reset-dialog", {'openDialog': true});
            },

            validatePassword() {
                return (this.form.password === this.form.password_confirmation) ? '' : 'Mismatch confirm password.'
            },

            toLogin() {
                this.isRegister = false;
                this.$refs.focus.focus();
            },

            toRegister() {
                this.isRegister = true;
                this.$refs.focus.focus();
            },

            submitLogin(){
                this.loginForm.post('/login', this.loginForm)
                        .then(response => this.submitLoginSuccess(response))
            },

            submitLoginSuccess(data){
                if(!data.result){
                    this.activateError = true;
                } else {
                    this.dialog = false;
                    location.pathname == '/cart' ? window.location.href = '/cart' : window.location.href = window.location.href;
                }
            },

            submitRegister(){
                this.form.post('/register', this.form)
                        .then(response => this.submitRegisterSuccess(response.data))
            },

            submitRegisterSuccess(){
                this.dialog = false;
                // window.location.href = window.location.href;
                window.event.$emit("login-alert", {'openDialog': true});
            },
        },

        watch: {
            dialog (val) {
                this.isRegister = false;
            }
          }
    }
</script>