import Home from "../views/modules/Home.vue";
import Login from "../views/modules/auth/Login.vue";
import Register from "../views/modules/auth/Register.vue";

export const routes = [
    {
        path: "/",
        component: Home
    },
    {
        path: "/login",
        component: Login
    },
    {
        path: "/register",
        component: Register
    }
];
