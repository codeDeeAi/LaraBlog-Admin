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
import tags from "./components/tags.vue";
import categories from "./components/categories.vue";

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
        name: "home",
        component: adminhome,
        meta: {
            breadcrumb: [{ name: "home" }]
        },
        children: [{
                path: "/admin-dashboard",
                name: "home",
                component: admindashboard,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            },
            {
                path: "/admin-allusers",
                name: "users",
                component: users,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            },
            {
                path: "/admin-allmail",
                name: "mail",
                component: mail,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            },
            {
                path: "/admin-allblogs",
                name: "blogs",
                component: blogs,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            },
            {
                path: "/admin-alltags",
                name: "tags",
                component: tags,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            },
            {
                path: "/admin-allcategories",
                name: "category",
                component: categories,
                meta: {
                    breadcrumb: [{ name: "home" }]
                }
            }
        ]
    }
];

export default new Router({
    mode: "history",
    routes
});