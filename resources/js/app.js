require("./bootstrap");

import Vue from "vue";
import Router from "./routes";
import MainApp from "./MainApp";
import stores from "./stores/index";

const app = new Vue({
    el: "#app",

    router: Router,
    store: stores,

    render: h => h(MainApp)
});
