import Vue from "vue";
import Router from "vue-router";

// Use Router
Vue.use(Router);

// Import components
import homepage from "./components/pages/homepage.vue";
import login from "./components/pages/login.vue";
import adminhome from "./components/pages/adminhomepage.vue";
import admindashboard from "./components/admindashboard.vue";
import users from "./components/users.vue";
import mail from "./components/mail.vue";
import blogs from "./components/blogs.vue";

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
                path: '/admin-dashboard',
                component: admindashboard
            },
            {
                path: '/admin-allusers',
                component: users
            },
            {
                path: '/admin-allmail',
                component: mail
            },
            {
                path: '/admin-allblogs',
                component: blogs
            },
        ]
    },
];

export default new Router({
    mode: "history",
    routes
});