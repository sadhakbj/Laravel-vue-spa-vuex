export default {
    /**
     * Get the status if user is logged in or not.
     * @param {Object} state
     */
    isLoggedIn(state) {
        if (state.currentUser === null) {
            return false;
        }
        return state.currentUser.token !== "";
    },
    /**
     * Get the current user.
     * @param {Object} state
     */
    currentUser(state) {
        return state.currentUser;
    }
};
