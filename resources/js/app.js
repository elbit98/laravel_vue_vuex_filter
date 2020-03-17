require('./bootstrap');
import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue'
import VuePreloaders from 'vue-preloaders'

import store from './store/index'

Vue.use(VuePreloaders);
Vue.use(BootstrapVue);
Vue.component('dashboard', require('./components/Dashboard').default);

const app = new Vue({
    el: '#app',
    store
});
