export default {
    setCurrentUser: (state, currentUser) => {
        state.currentUser = currentUser;
        state.isLoggedIn = true;
    },
    removeCurrentUser: state => {
        state.currentUser = null;
        state.isLoggedIn = false;
    }
};
