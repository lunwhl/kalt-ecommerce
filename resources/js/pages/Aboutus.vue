	<template>
		<v-app style="background: #fff;">
			<div data-app="true">
				<div class="container-fluid">
					<div class="row">
						<!-- <div style="display: block; margin-left: -150px;">
							<img src="/images/about-us-left-flow.png" style="width: 500px;" />
						</div> -->
						<div class="left-background">
							<div class="col-md-7">
								<img src="/images/about-us-left-flow.png" style="width: 600px; margin:30px -195px;" />
							</div>
							<div class="col-md-5"><img src="/images/about-us-35-years.png" style="width: 410px;" /></div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="container">
						<div class="intermediate-blue-h3 container-fluid">About us</div>	
					</div>
					<div class="col-md-12" style="text-align: right;">
						<img src="/images/about-us-right-flow.png" style="width: 450px; margin:-36px 0px;" />
					</div>
				</div>
				<div class="row">
					<div class="container">
						<h3 class="container-fluid gotham-bold" style="font-size: 20px;">WHO WE ARE</h3>
						<div class="container-fluid" style="font-size: 18px;">
							<b>We are a modernized online business to the Ban Leng, who has 30 years experience </br> in air conditioning. We, an one stop air conditioner online shop, committed to </br> provide you with convenient and unique shopping, as well as, better value each and </br> every time you shop at Kalt store.</b>
						</div>
					</div>
				</div>
				<div class="desktop-padding-top-65"></div>
				<div class="row">
					<div class="container">
						<h3 class="container-fluid gotham-bold" style="font-size: 20px;">WHAT WE DOES</h3>
						<div class="container-fluid" style="font-size: 18px;">
							<ul>
								<li>Our air conditioner are always sold at wholesale price.</li>
								<li>Our air conditioner are branded and from reputable suppliers with high standard of quality control.</li>
								<li>We provide professional in-store and after sale services.</li>
								<li>We are a reliable organization which partnership with 30 years experiences air conditioner’s company.</li>
								<li>We have superb quality of services and accessories.</li>
								<li>We provide variety service from installation, scheduled servicing, inspection, repair, to warranty care.</li>
								<li>You no longer need to carry your heavy product home by yourself, as we will send you your products
   									</br> to your doorstep with affordable price.</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="desktop-padding-top-65"></div>
				<div class="row">
					<div class="container">
						<h3 class="container-fluid gotham-bold" style="font-size: 20px;">WHERE WE ARE</h3>
						<div class="row" style="font-size: 18px;">
							<div class="row container-fluid">
								<div class="col-md-6">
									<div class="container-fluid">Our warehouse is located in Bukit Mertajam, Pulau Pinang.</div>
									<div class="container-fluid">You can find us here.</div>
									</br>
									<div class="container-fluid"><b>Kalt Air Conditioning Enterprise</b></div>
									<div class="container-fluid">7 & 9, Lebuh Nangka 2, Taman Desa Damai,</div>
									<div class="container-fluid">14000 Bukit Mertajam, Pulau Pinang.</div>
									</br>
									<div class="container-fluid"><b>Tel:</b> 012-4920969     |     <b>Fax:</b> 04-5399577</div>
									<div class="container-fluid"><b>Opening Hour:</b> Monday to Saturday 9.00am to 6.00pm</div>
								</div>
								<div class="col-md-6 mt-2">
									<img src="/images/kalt-shop-01.jpg" />
									
								</div>
							</div>
						</div>
					</div>
				</div>


				<div class="subscribe-section container-fluid no-padding" id="shop" style="margin-top: 25px">
					<div class="container">
						<div class="section-header" style="margin-bottom: 20px;">
							<h3 class="dark-blue">Our Shop</h3>
						</div>
						    <v-flex>
						        <v-container>
						          <v-layout row wrap>
						          	<v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6587.jpg')"
						                 src="/images/IMG_6587.jpg"
						                  lazy-src="/images/IMG_6587.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Kalt Shop</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6582.jpg')"
						                 src="/images/IMG_6582.jpg"
						                  lazy-src="/images/IMG_6582.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Customer service counter</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6580.jpg')"
						                 src="/images/IMG_6580.jpg"
						                  lazy-src="/images/IMG_6580jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Shop - Air Cond, Spare Part and Accessories</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6581.jpg')"
						                 src="/images/IMG_6581.jpg"
						                  lazy-src="/images/IMG_6581.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Admin office</div>
						              </v-card>
						            </v-flex>
						            
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6583.jpg')"
						                 src="/images/IMG_6583.jpg"
						                  lazy-src="/images/IMG_6583.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Repair and Service area</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6590.jpg')"
						                 src="/images/IMG_6590.jpg"
						                  lazy-src="/images/IMG_6590.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Warehouse 1</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6584.jpg')"
						                 src="/images/IMG_6584.jpg"
						                  lazy-src="/images/IMG_6584.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Warehouse 2</div>
						              </v-card>
						            </v-flex>
						            <v-flex
						              xs6
						              md3
						            >
						              <v-card flat tile>
						                <v-img
						                style="cursor: pointer;"
						                	@click="imageInModal('IMG_6585.jpg')"
						                 src="/images/IMG_6585.jpg"
						                  lazy-src="/images/IMG_6585.jpg"
						                  aspect-ratio="1"
						                  class="grey lighten-2 shop-image"
						                >
						                  <v-layout
						                    slot="placeholder"
						                    fill-height
						                    align-center
						                    justify-center
						                    ma-0
						                  >
						                    <v-progress-circular indeterminate color="grey lighten-5"></v-progress-circular>
						                  </v-layout>
						                </v-img>
						                <div class="gallery-title">Warehouse 3</div>
						              </v-card>
						            </v-flex>
						          </v-layout>
						        </v-container>
						    </v-flex>
					</div>
				</div>
				<v-dialog
			      v-model="dialog"
			    >
			      <v-card>
			        <v-card-text style="text-align:center;">
			          <img style="width: 750px;" :src="enlargeImage" />
			      	</v-card-text>
			      </v-card>
			    </v-dialog>
				<login></login>
			</div>
		</v-app>
	</template>
@stop

<script>
	import Login from '../components/Login.vue';

    export default {
    	components: {
			Login,
		},

    	data() {
    		return {	
    			Cart: [],
				dialog: false,
				enlargeImage: '',
    		};
    	},

        mounted() {
        	this.getCart();
        },

        methods: {
        	imageInModal(n) {
        		console.log(n);
        		this.enlargeImage = '/images/'+n;
        		this.dialog = true;
        	},
        	
        	getCart() {
				let url = 'cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.Cart = data
        	},
        },
    }
</script>