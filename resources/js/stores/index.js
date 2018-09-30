import Vue from "vue";
import Vuex from "vuex";
import Global from "./Global";

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        global: Global
    }
});

export default store;
