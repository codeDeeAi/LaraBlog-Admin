// const { default: Vue } = require('vue');

require('./bootstrap');

// Load Vue JS
window.Vue = require('vue');

// require('bootstrap')
//     // import bootstrap from 'public/css/app.css'
// Vue.use(bootstrap);

// Import router JS for vue routes
import router from './router'

// Import router JS for vue routes
import common from './common'


// Load Vue Toasts
import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
//import 'vue-toast-notification/dist/theme-sugar.css';


Vue.use(VueToast, {
    // One of the options
    position: 'top-right',
    duration: 5000,
    pauseOnHover: true,
})

// Import vue components
Vue.component('main-app', require('./components/mainapp.vue').default);

// Use Common Js
Vue.mixin(common)

const app = new Vue({
    el: '#app',
    router
});