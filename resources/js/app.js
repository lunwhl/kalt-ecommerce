
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = require('vue');

window.event = new Vue();

require('./filters');
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('home-page', require('./pages/Home.vue'));
Vue.component('shop-page', require('./pages/Shop.vue'));
Vue.component('cart-page', require('./pages/Cart.vue'));
Vue.component('checkout-page', require('./pages/Checkout.vue'));
Vue.component('product-page', require('./pages/Product.vue'));
Vue.component('order-page', require('./pages/Order.vue'));
Vue.component('cart', require('./components/Cart.vue'));

// const files = require.context('./', true, /\.vue$/i)

// files.keys().map(key => {
//     return Vue.component(_.last(key.split('/')).split('.')[0], files(key))
// })

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.component('loader', require('./base/Loader.vue'));

import Vuetify from 'vuetify';
import 'vuetify/dist/vuetify.min.css';
import 'material-design-icons-iconfont/dist/material-design-icons.css';

Vue.use(Vuetify, {
  theme: {
    primary: '#40c7f2',
    secondary: '#b0bec5',
    accent: '#8c9eff',
    error: '#b71c1c'
  }
})

// window.Vuetify = require('vuetify');
// import colors from 'vuetify/es5/util/colors'

Vue.component('text-input', require('./base/TextInput.vue'));
Vue.use(Vuetify);
const app = new Vue({
    el: '#app'
});
