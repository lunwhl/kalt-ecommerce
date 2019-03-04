<template>
    <v-app style="background: #fff;">
		<!--======= SUB BANNER =========-->
	    <section class="sub-banner animate fadeInUp" data-wow-delay="0.4s">
	      <div class="container">
	        <h4>ALL PRODUCTS</h4>
	      </div>
	    </section>

		<section class="section-p-30px pages-in">
 		 <div class="container">
	        <div class="row">
	          <!--======= SIDE BAR =========-->
	          <div class="col-sm-3 animate fadeInLeft" data-wow-delay="0.2s">
	            <div class="side-bar">
	              <h4>Filter by</h4>
	              <!-- HEADING -->
	              <div v-if="categories" v-for="(category, index) in categories" class="heading">
	                <h6>{{$options.filters.set_category_label(index)}}</h6>
	                <ul class="cate">
	                	<li v-for="(cate, index) in category">
	                		<div class="checkbox">
	                			<input type="checkbox" v-model="item.category" @click="checkboxCategory" :id="'category_' + cate.id" :value="cate.id"/><label style="font-weight: bold;">{{cate.name}}</label>
	                		</div>
	                	</li>
	                </ul>
	              </div>
	              
	              <!-- HEADING -->
	              <div class="heading">
	                <h6>BTU</h6>
	              </div>
	              <!-- PRICE -->
	              <div class="cost-price-content">
	                <div id="price-range" class="price-range"></div>
	                <span id="price-min" class="price-min">20</span> <span id="price-max" class="price-max">80</span> </div>
	              <a @click="filterBTU" class="btn-shop btn-small btn-dark" >FILTER</a> 
	          
	            </div>
	          </div>
	          
	          <!--======= ITEMS =========-->
	          <div class="col-sm-9 animate fadeInUp" data-wow-delay="0.2s">
	            <div class="items-short-type animate fadeInUp" data-wow-delay="0.4s">
	              <!--======= SHORT BY =========-->
                  <div style="margin-bottom: 4px;">
                      <input style="border:1px solid #e6e6e6; padding: 6px 10px;" v-model="search" placeholder="Search" />
                      <button @click="submitSearch" class="btn-shop btn-small btn-dark">Search</button>
                  </div>
	              <div class="short-by">
	                <select  v-model="sortSelected" @change="changeSort" class="selectpicker" style="border:1px solid #ebebeb; padding:4px 10px;">
	                  <option value="asc">Lowest to highest</option>
	                  <option value="desc">Highest to lowest</option>
	                </select>
	                <p>Showing {{this.skip+1}}-{{maxProductShowRange}} of {{productTotal}} products</p>
	              </div>
	            </div>
	            
                <template v-if="products.length > 0">
	            <!--======= Products =========-->
    	            <ListProduct :products="products" :fromHome="false"></ListProduct>
    	            
    	            <!--======= PAGINATION =========-->
    	            <div class="pagination animate fadeInUp" style="width:100%" data-wow-delay="0.4s">
    	              	<v-pagination
    						v-model="page"
    						:length="countPaginate"
    						color="#40c7f2"
    						@input="next"
                    	></v-pagination>
    	            </div>
                </template>
                <h2 v-else class="text-center">
                    No product found
                  </h2>
	          </div>
	        </div>
	       </div>
	     </section>
         <v-snackbar v-model="snackbar"
        right="right"
        :timeout="timeout"
        top="top"
        >
        {{snackbarMsg}}
        </v-snackbar>
	     <share></share>
         <login></login>

	</v-app>

</template>
@stop

<script>
	import Share from '../components/Share.vue';
	import ListProduct from '../components/ListProduct.vue';
    import Login from '../components/Login.vue';

    export default {
    	components: {
			Share,
            Login,
			ListProduct
		},

    	props: ['is_auth'],

    	data() {
    		return {
    			latestProducts: [],
    			categories: [],
    			Cart: [],
    			item: {
    				category: []
    			},
    			page: 1,
    			skip: 0,
    			take: 12,
    			url: '',
    			hpMin: 9000,
    			hpMax: 60000,
    			sortSelected: 'asc', 
    			productTotal: 0,
    			products: [],
                snackbar: false,
                snackbarMsg: '',
                timeout: 2000,
                search: '',
                btuParam: '',
    		};
    	},

        mounted() {
            this.btuParam = new URL(location.href).searchParams.get("btu");
            this.hpMin = this.btuParam != null && this.btuParam >= 9000  && this.btuParam <= 60000? parseInt(new URL(location.href).searchParams.get("btu")) : 9000;
            this.getCategories();
            this.getProductForShop();
            window.event.$on("copied", () => {
            	this.snackbarMsg = 'Link copied';
        		this.snackbar = true;
        	});
        	window.event.$on("share-to-shop", (value) => {
        		window.event.$emit("share-dialog", {'openDialog': value['openDialog'], 'product': value['product']});
            });

            window.event.$on("slider-changed", () => {
                this.filterBTU();
            });
            window.event.$on("copied", () => {
                this.snackbarMsg = 'Link copied';
                this.snackbar = true;
            });
        },

        methods: {
        	share(product) {
                window.event.$emit("share-dialog", {'openDialog': true, 'product': product});
            },
        	
        	next() {
                this.skip = (this.page - 1) * this.take;
                
                if(this.search != ''){
                    this.submitSearch(false);
                } else {
                    this.getProductForShop();
                }
        	},

        	changeSort() {
        		this.getProductForShop();
        	},

            submitSearch(firstSearch = true) {
                if(firstSearch){
                    this.skip = 0;
                    this.page = 1;
                }

                if(this.search != ''){
                    let url = 'api/shop/search?keyword=' + this.search + '&skip=' + this.skip + '&take=' + this.take;
                    axios.get(url)
                    .then(response => this.setProductForShop(response.data));
                } else {
                    this.getProductForShop();
                }
            },

        	filterBTU() {
        		this.hpMin = $('#price-min').text();
        		this.hpMax = $('#price-max').text();
        		Vue.nextTick(()=>{
				    this.getProductForShop();
				}); 
        	},

        	checkboxCategory() {
        		Vue.nextTick(()=>{
				    this.getProductForShop();
				}); 
        	},

        	getProductForShop() {
                let isbtu = this.btuParam != null;

        		let url = 'api/shop/products?category=' + this.item['category'].toString() + '&btu=' + this.hpMin + ',' + this.hpMax + '&sort=' + this.sortSelected + '&skip=' + this.skip + '&take=' + this.take + '&isbtu=' + isbtu;
        		axios.get(url)
        		.then(response => this.setProductForShop(response.data));
        	},

        	setProductForShop(data) {
        		this.productTotal = data.data.totalProduct;
        		this.products = data.data.products;
        	},

        	getCategories() {
        		axios.get('api/shop/categories')
        		.then(response => this.setCategories(response.data));
        	},

        	setCategories(data) {
        		this.categories = data.data;
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

        computed: {
        	countPaginate: function() {
        		return Math.ceil(this.productTotal / this.take);
        	},

        	maxProductShowRange: function() {
        		let total = 0;
        		this.productTotal / (this.page * this.take) < 1 ? total = this.productTotal :  total = this.page * this.take;
        		return total;  
        	},
        },
    }
</script>