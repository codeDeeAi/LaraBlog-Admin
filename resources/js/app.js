// const { default: Vue } = require('vue');

require('./bootstrap');

// Load Vue JS
window.Vue = require('vue');

// require('bootstrap')
//     // import bootstrap from 'public/css/app.css'
// Vue.use(bootstrap);

// Import router JS for vue routes
import router from './router'

// Import vue components
Vue.component('main-app', require('./components/mainapp.vue').default);

const app = new Vue({
    el: '#app',
    router
});