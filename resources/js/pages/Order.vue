	<template>
		<v-app style="background: #fff;">
			<v-content>
				<div class="text-xs-center" style="margin:35px 0px 35px 0px;">
					<h3>My Orders</h3>
				</div>
				<v-data-table :headers="headers"
								:items="items"
								:pagination.sync="pagination"
								:total-items="total"
								class="elevation-1"
								v-if="items.length > 0">
					<template slot="items" slot-scope="props">
						<td class="text-xs-center">{{ props.item.id }}</td>
						<td class="text-xs-center">{{ props.item.subtotal }}</td>
						<td class="text-xs-center">{{ props.item.shipping_price ? props.item.shipping_price : 'N/A' }}</td>
						<td class="text-xs-center">{{ props.item.total }}</td>
						<td class="text-xs-center">{{ props.item.status }}</td>
						<td class="text-xs-center">{{ props.item.note ? props.item.note : 'N/A' }}</td>
						<td class="text-xs-center"><v-btn @click="viewOrder(props.item)" color="info">Info</v-btn></td>
					</template>
				</v-data-table>
				<div v-else class="text-xs-center">
					<h4>You do not have any order record. Click <a href="/shop">here</a> to shop.</h4>
				</div>
				<login></login>
				<order></order>
			</v-content>
		</v-app>
	</template>
@stop

<script>
	import Login from '../components/Login.vue';
	import Order from '../components/Order.vue';

    export default {
    	components: {
			Login,
			Order
		},
    	data() {
    		return {
    			isLoading: true,
    			Cart: [],
    			items: [],
    			total: 0,
		        pagination: {
					descending: true,
					page: 1,
					rowsPerPage: 5,
					sortBy: 'id',
					totalItems: 0,
				},
		        headers: [
		          { text: 'Order ID', align: 'center', value: 'id'},
		          { text: 'Sub Total', align: 'center', value: 'subtotal' },
		          { text: 'Shipping Price', align: 'center', value: 'shipping_price' },
		          { text: 'Total', align: 'center', value: 'total' },
		          { text: 'Status', align: 'center', value: 'status' },
		          { text: 'Note', align: 'center', value: 'note' },
		          { text: 'Action', align: 'center', value: 'action' }
		        ]
    		};
    	},
        mounted() {
        	this.getCart();
        	this.getDataFromApi();
        },
     	methods: {
        	getCart() {
				let url = '/cart/index';
        		axios.post(url)
        		.then(response => this.getCartSuccess(response.data));
        	},

        	getCartSuccess(data) {
        		this.Cart = data;
        	},

			getDataFromApi () {
				return new Promise((resolve, reject) => {
			  		const { sortBy, descending, page, rowsPerPage } = this.pagination;

				  	axios.get('/api/order/items?sort_by=' + sortBy + '&descending=' + descending + '&page=' + page + '&row=' + rowsPerPage)
						.then(response => this.setItems(response.data));

					axios.get('/api/order/total')
						.then(response => this.setTotal(response.data));
				
					// if (rowsPerPage > 0) {
			  //           this.total = this.total.slice((page - 1) * rowsPerPage, page * rowsPerPage)
		   //        	}
				})
			},

	      	setItems(data) {
	      		this.items = data['orders'];
	      	},

	      	setTotal(data) {
      			this.total = data['total'];
	      	},

	      	viewOrder(order) {
	      		window.event.$emit("order-dialog", {'openDialog': true, 'order': order});
	      	},
    	},
        watch: {
	      pagination: {
	        handler () {
	          this.getDataFromApi()
	            .then(data => {
	              this.desserts = data.items
	              this.totalDesserts = data.total
	            })
	        },
	        deep: true
	      }
	    },
    }
</script>