import Vue from "vue";
import Router from "vue-router";

// Use Router
Vue.use(Router);

// Import components
import homepage from "./components/pages/homepage.vue";
import login from "./components/pages/login.vue";
import adminhome from "./components/pages/adminhomepage.vue";

const routes = [{
        path: "/my-new-vue-route",
        component: homepage
    },
    {
        path: "/login",
        component: login
    },
    {
        path: "/adminhome",
        component: adminhome,
        children: [{
            path: '/login2',
            component: login
        }, ]
    },
];

export default new Router({
    mode: "history",
    routes
});