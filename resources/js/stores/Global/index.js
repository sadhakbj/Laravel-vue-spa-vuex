import state from "./state";
import mutations from "./mutation";
import getters from "./getter";
import actions from "./actions";

export default {
    namespaced: true,

    state: state,
    mutations: mutations,
    getters: getters,
    actions: actions
};
