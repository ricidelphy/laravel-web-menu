require('./bootstrap');
import Vue from "vue";
import store from './store/store'
import router from './router';
import axios from 'axios';
import VueSweetalert2 from 'vue-sweetalert2';
// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';

import { BootstrapVue, BootstrapVueIcons } from 'bootstrap-vue' //Importing

Vue.use(BootstrapVue) // Telling Vue to use this in whole application
import 'bootstrap-vue/dist/bootstrap-vue-icons.min.css'
Vue.use(BootstrapVueIcons)
import App from './App.vue'

// Vue.use(router);
Vue.use(VueSweetalert2);
// vue-currency-filter
import VueCurrencyFilter from 'vue-currency-filter'
Vue.use(VueCurrencyFilter, {
    symbol: 'Rp.',
    thousandsSeparator: '.',
    fractionCount: 0,
    fractionSeparator: ',',
    symbolPosition: 'front',
    symbolSpacing: true
})



new Vue({
    router,
    store,
    components: {
        App
    },


    render: h => h(App)
}).$mount("#app");