export default {
    isLoggedIn(state) {
        return state.currentUser.token !== "";
    }
};
