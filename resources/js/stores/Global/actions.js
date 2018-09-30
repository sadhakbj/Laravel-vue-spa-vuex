export default {
    setCurrentUser(context, currentUser) {
        localStorage.setItem("currentUser", JSON.stringify(currentUser));
        context.commit("setCurrentUser", currentUser);
    },

    fetchCurrentUserFromLocalstorage(context) {
        const currentUser = JSON.parse(localStorage.getItem("currentUser"));
        if (currentUser) {
            context.commit("setCurrentUser", currentUser);
        }
    }
};
