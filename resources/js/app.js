import Vue from 'vue'
import VueRouter from 'vue-router'
import VueI18nManager from 'vue-i18n-manager'
import store from './store/index'
//import langConfig from './lang/config'
import Vuetify from 'vuetify'
import 'vuetify/dist/vuetify.min.css'
import VeeValidate from 'vee-validate'

window.axios = require('axios');
// Setup axios headers
window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest'
};

Vue.use(Vuetify)
Vue.use(VeeValidate)
Vue.use(VueRouter)


import App from './views/App'
import Home from './views/Home'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ],
});

const app = new Vue({
    el: '#app',
    components: { App },
    store,
    router,
});
