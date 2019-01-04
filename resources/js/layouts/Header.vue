<template>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <div class="container">
            <router-link class="navbar-brand" to="/">vueBook</router-link>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <template v-if="!isLoggedIn">
                        <li>
                            <router-link to="/login" class="nav-link">Login</router-link>
                        </li>
                        <li>
                            <router-link to="/register" class="nav-link">Register</router-link>
                        </li>
                    </template>
                    <template v-else>
                        <li>
                            <router-link to="/users" class="nav-link">Users</router-link>
                        </li>
                        <li>
                            <router-link to="/dashboard" class="nav-link">Dashboard</router-link>
                        </li>
                        <li>
                            <a href="#" class="nav-link" @click="logOut">Log Out</a>
                        </li>
                    </template>
                </ul>
            </div>
        </div>
    </nav>
</template>
<script>
  import {mapGetters} from "vuex";

  export default {
    name: "app-header",
    computed: {
      ...mapGetters("global", {
        isLoggedIn: "isLoggedIn",
        currentUser: "currentUser"
      })
    },
    methods: {
      logOut() {
        localStorage.removeItem("currentUser");
        this.$store.commit("global/removeCurrentUser");
        this.$router.push("/login");
      }
    }
  };
</script>