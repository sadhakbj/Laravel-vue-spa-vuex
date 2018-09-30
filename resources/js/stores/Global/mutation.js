export default {
    setCurrentUser: (state, currentUser) => {
        console.log(state, currentUser);
        state.currentUser = currentUser;
    }
};
