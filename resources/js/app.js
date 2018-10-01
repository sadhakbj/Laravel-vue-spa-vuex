require("./bootstrap");

import Vue from "vue";
import MainApp from "./MainApp";
import stores from "./stores/index";
import Router from "./routes";

/**
 * Initialize v-toaster
 */
import Toaster from "v-toaster";
import "v-toaster/dist/v-toaster.css";
Vue.use(Toaster, { timeout: 5000 });

const app = new Vue({
    el: "#app",

    router: Router,
    store: stores,

    render: h => h(MainApp)
});
