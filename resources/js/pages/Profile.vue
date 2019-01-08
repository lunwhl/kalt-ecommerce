	<template>
		<v-app>
			<div class="container">
	            <div class="text-center">
	                <!-- <div class="simple-article size-3 uppercase col-xs-b5">Update Your Profile</div> -->
	                <div class="h2">My Profile</div>
	                <div class="title-underline center"><span></span></div>
	            </div>
        	</div>

        	<div class="container">
        		<form>
		            <div class="row">
		                <div class="col-md-12 col-xs-b50 col-md-b0">
		                    <h4 class="h4 col-xs-b25">profile details</h4>
		                    <div class="row m10">
		                        <div class="col-sm-12">
		                            <input class="simple-input" v-model="form.name" type="text" value="" placeholder="Name*" />
		                            <span class="text-danger" v-if="form.errors.has('name')">{{ form.errors.get('name') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <input class="simple-input" v-model="form.address" type="text" value="" placeholder="Address*" />
		                    <span class="text-danger" v-if="form.errors.has('address')">{{ form.errors.get('address') }}</span>
		                    <div class="empty-space col-xs-b20"></div>
	                        <input class="simple-input" v-model="form.city" type="text" value="" placeholder="City*" />
		                    <span class="text-danger" v-if="form.errors.has('city')">{{ form.errors.get('city') }}</span>
	                        <div class="empty-space col-xs-b20"></div>
		                    <div class="row m10">
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.state" type="text" value="" placeholder="State*" />
		                    		<span class="text-danger" v-if="form.errors.has('state')">{{ form.errors.get('state') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.postcode" type="text" value="" placeholder="Postcode*" />
		                    		<span class="text-danger" v-if="form.errors.has('postcode')">{{ form.errors.get('postcode') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <div class="row m10">
		                        <div class="col-sm-12">
		                            <input class="simple-input" v-model="form.phone" type="text" value="" placeholder="Phone*" />
		                    		<span class="text-danger" v-if="form.errors.has('phone')">{{ form.errors.get('phone') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                    <div class="row m10">
		                        <div class="col-sm-6">
		                            <input class="simple-input" type="password" v-model="form.password" value="" placeholder="Password" />
		                    		<span class="text-danger" v-if="form.errors.has('password')">{{ form.errors.get('password') }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                        <div class="col-sm-6">
		                            <input class="simple-input" v-model="form.password_confirmation" type="password" value="" placeholder="Confirm password" />
		                    		<span class="text-danger" v-if="validatePassword">{{ validatePassword }}</span>
		                            <div class="empty-space col-xs-b20"></div>
		                        </div>
		                    </div>
		                </div>
		                <div class="col-md-12">
		                    <div class="empty-space col-xs-b30"></div>
		                    <div @click="submit" class="button block size-2 style-3">
		                        <span class="button-wrapper">
		                            <span class="icon"><img src="/css/exzo/img/icon-4.png" alt=""></span>
		                            <span class="text">Update</span>
		                        </span>
		                    </div>
		                </div>
		            </div>
		        </form>
        	</div>
        	<alert-login title="Confirm Password" message="Password and confirm password mismatch."></alert-login>
        	<v-snackbar v-model="snackbar"
				right="right"
				:timeout="timeout"
				top="top"
			>
			{{snackbarMsg}}
			</v-snackbar>
		</v-app>
	</template>
@stop

<script>
	import AlertLogin from '../components/AlertLogin.vue';

    export default {
    	components: {
			AlertLogin
		},

    	data() {
    		return {
    			carts: [],
    			form : new Form ({
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
				snackbar: false,
    			snackbarMsg: '',
    			timeout: 2000,
    		};
    	},

        mounted() {
            this.getCart();
            this.getUser();
        },

        methods: {
        	submit() {
        		if(this.validatePassword !== ''){
        			window.event.$emit("login-alert", {'openDialog': true});
        		} else {
        			let url = '/api/home/profile/update';
        			this.form.post(url, this.form)
        				.then(response => this.submitSuccess(response.data));
        		}
        	},

        	submitSuccess(data) {
				this.snackbarMsg = 'Profile updated';
        		this.snackbar = true;
        		this.getUser();
        	},

        	getUser() {
        		let url = '/api/home/auth';
        		axios.get(url)
        		.then(response => this.getUserSuccess(response.data));
        	},

        	getUserSuccess(data) {
        		this.form.name = data.user['name'];
			    this.form.address = data.user['address'];
			    this.form.city = data.user['city'];
			    this.form.state = data.user['state'];
			    this.form.postcode = data.user['postcode'];
			    this.form.email = data.user['email'];
			    this.form.phone = data.user['phone'];
        	},

        	getCart() {
				let url = '/cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.carts = data;
        	},
        },

        computed: {
        	validatePassword() {
                return (this.form.password === this.form.password_confirmation) ? '' : 'Mismatch confirm password.'
            },
        },
    }
</script>