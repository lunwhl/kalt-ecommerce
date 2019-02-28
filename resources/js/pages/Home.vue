	<template>
		<v-app style="background: #fff;">
			<div data-app="true">
				<div class="container" style="text-align: center;">
					<div class="row">
						<div class="col-md-6 col-sm-12">
							<div style="display: block;">
								<img src="/images/Header.png" style="width: 500px;" />
							</div>
							<div style="font-size: 18px; padding: 0px 30px;" class="gotham-book">
								We are happy to bring out 30 years air conditioner business online and be your No.1 one-stop online air conditioner shop.
							</div>
							<div style="margin: 20px 0px;">
								<span class="cheapest-in-town">WITH THE CHEAPEST PRICE IN THE TOWN</span>
							</div>
							<div class="col-md-12" style="padding: 0px;">
								<div class="col-md-6">
									<div style="font-weight: bold;"><img src="/images/phone.png" class="img-30" /><span style="margin-left: 15px;">+601 2492 0969</span></div>
								</div>
								<div class="col-md-6">
									<div style="font-weight: bold;"><img src="/images/mail.png" class="img-30" /><span style="margin-left: 10px;">info@kalt.com.my</span></div>
								</div>
							</div>
							<div style="display: block; margin-left: -250px;">
								<img src="/images/flow.png" style="width: 500px;" />
							</div>
						</div>
						<div class="aircond-image col-md-6">
							<img src="/images/Header_Photo.png" style="width: 810px;" />
						</div>
					</div>
					<div>
						<a href="#our-product"><img src="/images/arrow-down.png" class="arrow-down" /></a>
					</div>
				</div>
				<div>
					<div class="row btu-calculator" style="margin: 0px auto;">
						<div class="container">
							<div class="row">
								<div class="col-md-2" style="display: flex;align-items: center;height: 40px;">
									<span>BTU Calculator</span>
								</div>
								<div class="col-md-8" style="display: flex;justify-content: center;align-items: center;height: 40px;">
									<input class="form-control" placeholder="Enter Square Feet" style="color:black; background: white; width:100%; padding: 0px 10px;" v-model="sqft" />
								</div>
								<div class="col-md-2" style="display: flex;justify-content: center;align-items: center;height: 40px;">
									<button @click="btuCalculator" class="btn-calculate gotham-book">Calculate</button>
								</div>
							</div>
							<div class="row">
								<div class="col-md-12">
									<small><i><b>Disclaimer:</b> This calculator is provided for an approximate check of heat loads. We accept no responsibility or liability resulting or howsover arising from its use.</i></small>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- <div class="photo-slider container-fluid no-padding" id="home"> -->
					<!-- Main Carousel -->
					<!-- <div id="main-carousel" class="carousel slide carousel-fade" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#main-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#main-carousel" data-slide-to="1"></li>
							<li data-target="#main-carousel" data-slide-to="2"></li>
						</ol>
						<div role="listbox" class="carousel-inner fix-height">
							<div class="item active">
								<div class="carousel-caption"> -->
									<!-- <h3 data-animation="animated fadeInLeft">New Way to Design Your Home</h3>
									<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
									<div class="col-md-12">
										<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
									</div>
									<img data-animation="animated fadeInDown" src="images/slider-1.png" alt="slider" width="900" height="342" /> -->
								<!-- </div>
							</div>
							<div class="item slide-1">
								<div class="carousel-caption"> -->
									<!-- <h3 data-animation="animated fadeInLeft">Give Us Something To Assemble</h3>
									<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
									<div class="col-md-12">
										<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
									</div>
									<img data-animation="animated fadeInDown" src="images/slider-2.png" alt="slider" width="722" height="343" /> -->
								<!-- </div>
							</div>
							<div class="item slide-2">
								<div class="carousel-caption"> -->
									<!-- <h3 data-animation="animated fadeInLeft">We like To Work A Lot With Wood</h3>
									<p data-animation="animated fadeInRight">I never thought I could feel so free! Well we're movin' on up to the east side to a deluxe apartment in the sky just two good ol' boys Never meanin.</p>
									<div class="col-md-12">
										<a href="#" data-animation="animated fadeInUp" title="Shop Now" class="shop-now">Shop Now</a>
									</div>
									<img data-animation="animated fadeInDown" src="images/slider-3.png" alt="slider" width="1056" height="345" /> -->
								<!-- </div>
							</div>
						</div> -->
					<!-- </div> --><!-- Main Carousel /-  -->
				<!-- </div> --><!-- Photo Slider /- -->

				<!-- Subscribe Section -->
				<!-- <div id="about-us">
					<div class="subscribe-section container-fluid no-padding">
						<div class="container">
							<div class="section-header">
								<h3 style="color:white;">About Us</h3>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h4 style="color:#40c7f2; text-align:left;">WHO WE ARE</h4>
									<div class="about-us-content" style="text-align:left;">
										<p>
											We are a modernized online business to the Ban Leng, who has 30 years experience in air conditioning. 
											We, an one stop air conditioner online shop, committed to provide you with convenient and unique shopping, as well as, better value each and every time you shop at Kalt store.
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h4 style="color:#40c7f2; text-align:left;">WHAT WE DOES</h4>
									<div class="about-us-content">
										<ul style="list-style-type: upper-greek;">
											<li>Our air conditioner are always sold at wholesale price.</li>
											<li>Our air conditioner are branded and from reputable suppliers with high standard of quality control.</li>
											<li>We provide professional in-store and after sale services.</li>
											<li>We are a reliable organization which partnership with 30 years experiences air conditioner’s company.</li>
											<li>We have superb quality of services and accessories.</li>
											<li>We provide variety service from installation, scheduled servicing, inspection, repair, to warranty care.</li>
											<li>You no longer need to carry your heavy product home by yourself, as we will send you your products to your doorstep with affordable price.</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h4 style="color:#40c7f2; text-align:left;">WHERE WE ARE</h4>
									<div class="about-us-content" style="text-align:left;">
										<p>
											Our warehouse is located in Bukit Mertajam, Pulau Pinang. You can find us here.
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="about-us-content" style="text-align:left;">
									<div class="col-sm-6">
										<h4 style="color:#40c7f2; text-align:left;">Kalt Air Conditioning Sdn. Bhd.</h4>
										<p>7 & 9, Lebuh Nangka 2, Taman Desa Damai,</br>
											14000 Bukit Mertajam,</br>
											Pulau Pinang.</br>
											Tel: 012-4020969</br> 
											Fax: 04-5399577 </br>
											Opening hour: Monday to Saturday 9.00am to 6.00pm
										</p>
									</div>
									<div class="col-sm-6">
										<div class="about-us-content" style="text-align:center;">
											<img src="/images/kalt-company.png" />
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="about-us-content" style="text-align:left;">
									<div class="col-sm-6" style="margin-bottom: 30px;">
										A. Kalt Customer Service Counter</br>
										B. Shop - Air Cond, Spare Part and Accesories</br>
										C. Service & Repair Area</br>
										D. Warehouse</br>
										E. Dispatch Area</br>
										F. Admin Office</br>
										G. Staff Pantry</br>
									</div>
									<div class="col-sm-6">
										<div class="about-us-content" style="text-align:center;">
											<img src="/images/warehouse.png" />
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div> -->

				<!-- Our Product -->
				<div id="our-product">
					<div class="latest-product our-products container-fluid no-padding woocommerce">
						<div class="row animate fadeInUp" data-wow-delay="0.2s">
							<div class="padding-top-75"></div>
							<!-- Container -->
							<div>
								<!-- Section Header -->
								<div class="section-header">
									<h3 class="dark-blue">Our Products</h3>
								</div><!-- Section Header /- -->

								<div class="section-header" style="margin-bottom: 10px;">
									<span>LATEST PRODUCTS</span>
								</div>

								<div class="row container home-product">
									<div class="col-sm-12 animate fadeInUp" data-wow-delay="0.2s">
										<ListProduct :products="latestProducts" :fromHome="true"></ListProduct>	
										<div style="text-align:center;padding: 0px 30px;">
											<span style="font-size: 20px;">We are happy to bring out 30 years air conditioner business online and be your No.1 one-stop online air conditioner shop.</span>
										</div>
									</div>
								</div>
								<div style="text-align:center;" class="row right-background">
									<div class="light-to-dark-blue">
										<a href="/shop"><span>VIEW MORE >></span></a>
									</div>
									<hr class="hori">
									
									<div class="section-header" style="margin-bottom: 10px;">
										<span>HOT SELLING PRODUCTS</span>
									</div>
								</div>
								<div class="row container home-product">
									<div class="col-sm-12 animate fadeInUp" data-wow-delay="0.2s">
										<ListProduct :products="hotSellingProducts" :fromHome="true"></ListProduct>
										<div style="text-align:center;padding: 0px 30px;">
											<span style="font-size: 20px;">We are happy to bring out 30 years air conditioner business online and be your No.1 one-stop online air conditioner shop.</span>
											<div class="light-to-dark-blue">
												<a href="/shop"><span>VIEW MORE >></span></a>
											</div>
										</div>
									</div>
								</div>
							</div><!-- Container /- -->
						</div><!-- Our Product /- -->
					</div>
				</div>

				<div class="subscribe-section container-fluid no-padding" id="faq">
					<div>
						<div class="section-header left-background" style="margin-bottom: 20px;">
							<h3 class="dark-blue" style="padding: 50px;">Our Services</h3>
						</div>
						<div class="service-container">
							<div class="col-md-12 padding-300">
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-02.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">AIR CONDITIONER</h3>
												<p style="font-size: 12px;">OUR BRANDED AIR CONDITIONERS ARE ALWAYS SOLD AT WHOLESALE PRICE. THEY ARE FROM REPUTABLE SUPPLIERS WITH HIGH STANDARD OF QUALITY CONTROL. </p>
												<div class="light-to-dark-blue">
													<a href="/shop"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-03.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">INSTALLATION</h3>
												<p style="font-size: 12px;">OUR INSTALLATION ONLY USES ACCESSORIES WITH THE HIGHEST QUALITY AND CONDUCTED BY VERY EXPERIENCED TECHNICIAN.</p>
												<div class="light-to-dark-blue">
													<a href="/service/#installation"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-04.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">CHEMICAL CLEANING</h3>
												<p style="font-size: 12px;">OVERHAUL IMPROVES AN AIR CONDITIONING UNIT’S PERFORMACE. OUR TECHNICIANS ARE TRAINED WELL IN OVERHAUL ALL AIR COND UNIT.</p>
												<div class="light-to-dark-blue">
													<a href="/service/#cleaning"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="service-container">
							<div class="col-md-12 padding-300">
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-05.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">INSPECTION & REPAIR</h3>
												<p style="font-size: 12px;">FACING PROBLEM, LIKE WATER LEAKAGE, NOT COLD, SENSOR BLINKING, AND NOT FUNCTIONING. OUR TECHNICIAN ARE HERE TO ATTEND AND PERFORM THE INSPECTION.</p>
												<div class="light-to-dark-blue">
													<a href="/service/#other"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-06.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">CONCEALLING</h3>
												<p style="font-size: 12px;">PLANNING FOR CONCEALLING THE COPPER PIPING WITH INSULATION, PVC PIPING AND WIRING IN YOUR NEW PREMISE? FEEL FREE TO CONTACT US ANYTIME FOR THE BEST QUOTATION.</p>
												<div class="light-to-dark-blue">
													<a href="/service/#other"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="col-md-12" style="padding: 0px;">
										<div class="col-md-5" style="padding: 0px;">
											<img src="/images/Kalt_website design_op1_FA-07.png" />
										</div>
										<div class="col-md-7" style="text-align: left; padding: 0px;">
											<div style="line-height:16px;">
												<h3 class="dark-blue gotham-bold" style="font-size: 20px;">WARRANTY CARE</h3>
												<p style="font-size: 12px;">OUR SUPPORT ENSURES YOU ENPERIENCE AN EASY AND HASSLE FREE PROCESS DURING WARRANTY CLAIM. REGISTER YOUR CLAIM TO US AND LET US TAKE CARE OF THE REST.</p>
												<div class="light-to-dark-blue">
													<a href="/service/#other"><span>VIEW MORE >></span></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="subscribe-content">
							<h3 style="color:#488dcb; font-size: 20px">Installation</h3>
							<div class="row">
								<div class="col-sm-4">
									<h4 style="color:#40c7f2; text-align:left;">ECONOMY INSTALLATION</h4>
									<div class="about-us-content">
										<ul>
											<li>Up to 10ft 0.61mm thickness copper piping</li>
											<li>Up to 10ft 100% copper cable (without casing)</li>
												<ul>
													<li>1.0hp & 1.5hp Air Cond - 3 core 1.5mm</li>
													<li>1.75hp & above - 4 core 2.5mm</li>
												</ul>
											<li>Up to 10ft 1/2” thickness premium rubber density insulation</li>
											<li>Bracke</li>
											<li>1/2” thickness drainage piping</li>
											<li>Testing and commissioning of each air cond unit</li>
											<li>Electrical wiring interconnecting indoor & outdoor</li>
											<li>Vacuum to the system</li>
											<li>Refill in refrigerant gas</li>
										</ul>
									</div>
								</div>
								<div class="col-sm-4">
									<h4 style="color:#40c7f2; text-align:left;">BASIC INSTALLATION (WITHOUT REFRIGERANT PIPING)</h4>
									<div class="about-us-content">
										<ul>
											<li>No copper piping is included</li>
											<li>No wiring cable is included</li>
											<li>Bracket</li>
											<li>No drainage piping is included</li>
											<li>Testing and commissioning of each air cond unit</li>
											<li>Electrical wiring interconnecting indoor & outdoor</li>
											<li>Vacuum to the system</li>
											<li>Refill in refrigerant gas</li>
										</ul>
									</div>
								</div>
								<div class="col-sm-4">
									<h4 style="color:#40c7f2; text-align:left;">EXTRA CHARGEABLE FEES (WHICH PAYABLE TO INSTALLER)</h4>
									<div class="about-us-content">
										<ul>
											<li>Extra Piping for Wall Mounted Air Cond </br>
											<table class="service-table">
												<tr>
													<th>Hose Power</th>
													<th>Price</th>
												</tr>
												<tr>
													<td>1hp</td>
													<td>RM 18/ft</td>
												</tr>
												<tr>
													<td>1.5hp</td>
													<td>RM 20/ft</td>
												</tr>
												<tr>
													<td>2.0hp</td>
													<td>RM 20/ft</td>
												</tr>
												<tr>
													<td>2.5hp</td>
													<td>RM 25/ft</td>
												</tr>
												<tr>
													<td>3.0hp</td>
													<td>RM 25/ft</td>
												</tr>
											</table>
											</li>
											<li>PVC Casing for cable – RM 30/ft</li>
											<li>Drain Pump – RM 280</li>
											<li>Dismantling of old air conditioner – RM 80</li>
										</ul>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h3 style="color:#488dcb; font-size: 20px">Overhaul / Cleaning</h3>
									<span style="font-weight: bold; font-size: 45px; color:#86E2FF;">Water Leakage?</span>
									<span style="font-weight: bold; font-size: 45px; color:#FE5C7F;">Not Cold?</span>
									<div class="about-us-content">
										<div class="col-sm-6">
										<h4 style="color:#40c7f2; text-align:left;">Our service are as below:</h4>
										<p>
											To supply labour and tool for checking and dismantle the air cond unit, overhaul the unit with chemical, vacuum to the system, install it back, check the refrigerant gas pressure,  refill refrigerant gas and test run in a good condition.
										</p>
										</div>
										<div class="col-sm-6">
											<h4 style="color:#40c7f2; text-align:left;">Overhaul Pricing:</h4>
											<span style="color:#40c7f2; text-align:left; font-weight: bold;">Wall Mounted</span>
											<table class="service-table">
												<tr>
													<th>Hose Power</th>
													<th>R22 gas Air Cond</th>
													<th>R410 gas Air Cond</th>
												</tr>
												<tr>
													<td>1hp</td>
													<td>RM120</td>
													<td>RM150</td>
												</tr>
												<tr>
													<td>1.5hp</td>
													<td>RM120</td>
													<td>RM150</td>
												</tr>
												<tr>
													<td>2.0hp</td>
													<td>RM180</td>
													<td>RM220</td>
												</tr>
												<tr>
													<td>2.5hp</td>
													<td>RM220</td>
													<td>RM220</td>
												</tr>
											</table>
											<span style="color:#40c7f2; text-align:left; font-weight: bold;">Cassette and Other Type</span>
											<p>You can contact us, and make appointment with us.</p>
										</div>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h3 style="color:#488dcb; font-size: 20px">Inspection and Repairing</h3>
									<div class="about-us-content" style="text-align:left;">
										<h4 style="color:#40c7f2; text-align:left;">Having a malfunction air cond?</h4>
										<p>
											Our experienced technicians will attend you and perform the inspection, with as low as RM50 per unit only. </br>
											You can contact us, and make appointment with us.
										</p>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-sm-12">
									<h3 style="color:#488dcb; font-size: 20px">Warranty Care</h3>
									<div class="about-us-content" style="text-align:left;">
										<p>
											You can contact us, check your warranty status with the serial no or invoice no.
										</p>
									</div>
								</div>
							</div>
						</div> -->
					</div>
				</div><!-- Subscribe Section /- -->

				<div class="subscribe-section container-fluid no-padding" id="faq">
					<div class="container">
						<div class="section-header" style="margin-bottom: 20px;">
							<h3 class="dark-blue">Our Shop</h3>
						</div>
						<div class="col-md-12" style="margin-bottom: 10px;">
							<v-flex
				              d-flex
				            >
								<v-card flat tile class="d-flex">
				                	<v-img
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
				              	</v-card>
				              	<v-card flat tile class="d-flex">
				                	<v-img
				                 		src="/images/IMG_6580.jpg"
				                  		lazy-src="/images/IMG_6580.jpg"
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
				              	</v-card>
				              	<v-card flat tile class="d-flex">
				                	<v-img
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
				              	</v-card>
				              	<v-card flat tile class="d-flex">
				                	<v-img
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
				              	</v-card>
				            </v-flex>
						</div>
						<div class="light-to-dark-blue">
							<a href="/about#shop"><span>VIEW MORE >></span></a>
						</div>
					</div>
				</div>
				<contact :needMap="true"></contact>				
				<v-snackbar v-model="snackbar"
				right="right"
				:timeout="timeout"
				top="top"
				>
				{{snackbarMsg}}
				</v-snackbar>
				<share></share>
				<login></login>
			</div>
		</v-app>
	</template>
@stop

<script>
	import ListProduct from '../components/ListProduct.vue';
	import Share from '../components/Share.vue';
	import Login from '../components/Login.vue';
	import Contact from '../components/Contact.vue';

    export default {
    	components: {
			Share,
			Login,
			ListProduct,
			Contact,
		},

    	props: ['is_auth'],

    	data() {
    		return {
    			isLoading: true,
    			latestProducts: [],
    			hotSellingProducts: [],
    			testCart: [],
    			Cart: [],
    			snackbar: false,
    			snackbarMsg: '',
    			timeout: 2000,
				sqft: '',
    		};
    	},

        mounted() {
        	this.getCart();
            this.getLatestProduct();
            this.getHotSellingProduct();
            window.event.$on("share-to-shop", (value) => {
        		window.event.$emit("share-dialog", {'openDialog': value['openDialog'], 'product': value['product']});
            });
            window.event.$on("copied", () => {
            	this.snackbarMsg = 'Link copied';
        		this.snackbar = true;
        	});
        },

        methods: {
        	btuCalculator() {
        		let space = this.sqft == '' ? 0 : this.sqft;
        		window.location.href = '/shop?btu=' + space*70;
        	},

        	getLatestProduct() {
        		axios.post('/home/products/latest')
        		.then(response => this.setLastestProduct(response.data));
        	},

        	setLastestProduct(data) {
        		this.latestProducts = data;

        		$('.latest-products').slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					centerPadding: '0px',
					responsive: [
					{
						breakpoint: 1000,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 640,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							centerMode: true,
							slidesToShow: 1
						}
					}]
				}); 
        	},

        	getHotSellingProduct() {
        		axios.post('/home/products/hot/selling')
        		.then(response => this.setHotSellingProduct(response.data));
        	},

        	setHotSellingProduct(data) {
        		this.hotSellingProducts = data;

        		$('.latest-products').slick({
					slidesToShow: 4,
					slidesToScroll: 1,
					centerPadding: '0px',
					responsive: [
					{
						breakpoint: 1000,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 991,
						settings: {
							slidesToShow: 3
						}
					},
					{
						breakpoint: 640,
						settings: {
							slidesToShow: 2
						}
					},
					{
						breakpoint: 480,
						settings: {
							centerMode: true,
							slidesToShow: 1
						}
					}]
				}); 
        	},

        	addToCart(product) {
        		this.testCart = product;
        		let url = 'cart/add/' + product.id;
        		axios.post(url)
        		.then(response => this.addToCartSuccess(response.data));
        	},

        	getCart() {
				let url = 'cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.Cart = data
        	},

        	addToCartSuccess(data) {
        		window.event.$emit("cart-add");
        	},
        },
    }
</script>