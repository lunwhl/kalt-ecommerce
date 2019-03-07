<template>
	<v-app style="background: #fff;">
		<div data-app="true">
			<div class="contact" id="contact-us" style="background-image: url('/images/bottom-background.png'); background-size: cover;">
				<div class="latest-product our-products container-fluid no-padding woocommerce">
					<div class="col-lg-12 col-md-12 col-sm-12 animate fadeInUp" data-wow-delay="0.2s">
						<!-- Container -->
						<div class="container">
							<!-- Section Header -->
							<div class="section-header">
								<h3 style="color: #fff; padding: 15px 0px;">Contact</h3>
							</div><!-- Section Header /- -->
							<div class="contact-us-content" style="text-align:left;">
								<div class="row">
									<div class="col-lg-6 col-md-12 col-sm-12">
										<p style="font-weight: 310;">You are always welcome to visit me or contact us while you have some comments or suggestions for us.</p>
										<h3 class="gotham-bold" style="font-size: 20px;">Kalt Air Conditioning Sdn. Bhd.</h3>
										</br>
										<p style="font-weight: 310;">7 & 9, Lebuh Nangka 2, Taman Desa Damai,</br>
										14000 Bukit Mertajam,
										Pulau Pinang.</br>
										<div class="row">
											<div class="col-lg-6 col-md-6">
												<b style="font-weight: bold;" class="gotham-bold">Tel:</b> <span style="font-weight: 310;">012-4920969</span></br> 
											</div>
											<div class="col-lg-6 col-md-6">
												<b style="font-weight: bold;" class="gotham-bold">Fax:</b> <span style="font-weight: 310;">04-5399577</span> </br>
											</div>
										</div>
										</br>
											<b style="font-weight: bold;" class="gotham-bold">Opening hour:</b> </br> <span style="font-weight: 310;">Monday to Saturday 9.00am to 6.00pm</span>
										</p>											
									</div>
									<div class="col-lg-6 col-md-12 col-sm-12 col-xs-12 contact-form">
										<h3 style="margin-top: 0px; font-size: 17px; font-weight: bold;">Leave a Message in the feedback form below.</h3>
										<form id="contact-form" class="row">
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<!-- <label style="font-size: 11px; font-style: italic; font-weight: 600; text-transform: uppercase; letter-spacing: 1.65px;">Your Name *</label> -->
												<input type="text" class="form-control" placeholder="NAME*" id="input_name"  v-model="form.contact_name" required>
												<span class="text-danger" v-if="form.errors.has('contact_name')">{{ form.errors.get('contact_name') }}</span>
											</div>
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<!-- <label style="font-size: 11px; font-style: italic; font-weight: 600; text-transform: uppercase; letter-spacing: 1.65px;">Your Email *</label> -->
												<input type="email" class="form-control" placeholder="EMAIL*" id="input_email" v-model="form.contact_email"  required>
												<span class="text-danger" v-if="form.errors.has('contact_email')">{{ form.errors.get('contact_email') }}</span>
											</div>
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<!-- <label style="font-size: 11px; font-style: italic; font-weight: 600; text-transform: uppercase; letter-spacing: 1.65px;">Subject</label> -->
												<input type="text" class="form-control" placeholder="CONTACT NO." id="input_subject" v-model="form.contact_no"required>
											</div>
											<div class="form-group col-md-6 col-sm-12 col-xs-12">
												<!-- <label style="font-size: 11px; font-style: italic; font-weight: 600; text-transform: uppercase; letter-spacing: 1.65px;">Subject</label> -->
												<input type="text" class="form-control" placeholder="SUBJECT" id="input_subject" v-model="form.contact_subject"required>
											</div>
											<div class="form-group col-md-12 col-sm-12 col-xs-12">
												<!-- <label style="font-size: 11px; font-style: italic; font-weight: 600; text-transform: uppercase; letter-spacing: 1.65px;">Your Message</label> -->
												<textarea class="form-control" rows="8" placeholder="MESSAGE*" id="textarea_message" v-model="form.contact_message"></textarea>
												<div class="form-group" style="text-align: right; margin-top:-39px; margin-right:-8px;">
													<a class="contact-btn" @click="submitInquiry">Send</a>
												</div>
											</div>
											
											<div id="alert-msg" class="alert-msg"></div>
										</form>
									</div>
								</div>
								<div v-if="needMap" class="col-md-12 col-xs-12">
									<div class="row map-responsive">
										<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3972.347527822591!2d100.44167631533769!3d5.363841996109295!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x304ac89ee787de17%3A0xf5655b54f32d2a26!2s9%2C+Lebuh+Nangka+2%2C+Taman+Desa+Damai%2C+14000+Bukit+Mertajam%2C+Pulau+Pinang!5e0!3m2!1sen!2smy!4v1550659025867" width="800" height="600" frameborder="0" style="border:0" allowfullscreen></iframe>
									</div>
								</div>
							</div>
						</div><!-- Container /- -->
					</div><!-- Our Product /- -->
				</div>
			</div>
		</div>
		<v-snackbar v-model="snackbar"
            right="right"
            :timeout="5000"
            top="top"
        >
            {{message}}
        </v-snackbar>
	</v-app>
</template>

<script>
	export default {

		props: ['needMap'],

		data() {
			return {
				form : new Form ({
				    contact_name: '',
				    contact_email: '',
				    contact_message: '',
				    contact_subject: '',
				    contact_no: '',
				}), 

				snackbar: false,
				message: "Thanks for your enquiry, our team will get back to you as soon as possible."
			};
		},

		mounted() {
			window.event.$on("contact-event", (value) => {
                this.form.contact_subject = value['subject'];
            });
        },

		methods: {
        	submitInquiry(){
        		this.form.post('/api/home/send/inquiry', this.form)
        				.then(response => this.submitInquirySuccess(response.data))
        				.catch(error => this.submitInquiryError(response.error));
        	},

        	submitInquirySuccess(data) {
        		this.snackbar = true;
        	},

        	submitInquiryError(data){
        		console.log(data);
        	},
		}
	}
</script>