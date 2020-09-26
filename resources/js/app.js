// const { default: Vue } = require('vue');

require('./bootstrap');

// Load Vue JS
window.Vue = require('vue');

// Import vue components
Vue.component('main-app', require('./components/mainapp.vue').default);

const app = new Vue({
    el: '#app'
});