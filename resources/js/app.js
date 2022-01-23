window.$ = window.jQuery = require('jquery');
window.Popper = require('popper.js').default;
require('./bootstrap');

//window.Vue = require('vue');
window.axios = require('axios');

import Vue from 'vue'
//import  App from './components/ExampleComponent.vue'
import VueChatScroll from 'vue-chat-scroll'
Vue.use(VueChatScroll)



Vue.component('example-component', require('./components/ExampleComponent.vue').default)
Vue.component('feature-image', require('./components/FeatureImage.vue').default)
Vue.component('update-feature-image', require('./components/UpdateFeatureImage.vue').default)

Vue.component('category-dropdown', require('./components/CategoryDropdown.vue').default)
Vue.component('update-category-dropdown', require('./components/UpdateCategoryDropdown.vue').default)

Vue.component('address-dropdown', require('./components/AddressDropdown.vue').default)
Vue.component('update-address-dropdown', require('./components/UpdateAddressDropdown.vue').default)

Vue.component('message', require('./components/Message.vue').default)
Vue.component('conversation', require('./components/Conversation.vue').default)

Vue.component('save_ad', require('./components/SaveAd.vue').default)

const app = new Vue({
	el: '#app',
	//component:{App}
});
