require("./bootstrap");

window.Vue = require("vue");

import VueRouter from "vue-router";
Vue.use(VueRouter);

import VueAxios from "vue-axios";
import axios from "axios";

import App from "./App.vue";
Vue.use(VueAxios, axios);

import ProductComponent from "./components/ProductComponent.vue";
import CreateProductComponent from "./components/CreateProductComponent.vue";
import IndexComponent from "./components/IndexComponent.vue";
import CartComponent from "./components/CartComponent.vue";
import EditComponent from "./components/EditComponent.vue";
import DetailsComponent from "./components/DetailsComponent.vue";

const routes = [
    {
        name: "home",
        path: "/",
        component: IndexComponent
    },
    {
        name: "create",
        path: "/create",
        component: CreateProductComponent
    },
    {
        name: "products",
        path: "/products",
        component: ProductComponent
    },
    {
        name: "edit",
        path: "/edit/:id",
        component: EditComponent
    },
    {
        name: "cart",
        path: "/cart",
        component: CartComponent
    },
    {
        name: "details",
        path: "/products/:id",
        component: DetailsComponent
    }
];

const router = new VueRouter({ mode: "history", routes: routes });
const app = new Vue(Vue.util.extend({ router }, App)).$mount("#app");
