Vue.filter('set_image', function(value){

	let url = '/storage/' + value;

	return url;
});

Vue.filter('set_category_label', function(value){
	let label = '';

	switch(value){
		case 'brand':
			label = 'BRAND';
			break;
		case 'type':
			label = 'TYPE';
			break;
		case 'horsepower':
			label = 'HOSE POWER';
			break;
		case 'features':
			label = 'FEATURES';
			break;
	}

	return label;
});

Vue.filter('set_icon', function(value){
	return '<v-tooltip bottom><img slot="activator" style="width:48px;" src="/images/' + value +'" /><span>Tooltip</span></v-tooltip>';
});