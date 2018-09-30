<template>
      <div class="main">
            <main-header/>
            <div class="container">
            <span v-text="isLoggedIn ? 'LoggedIn' : 'Not logged In'"></span>
                  
                  <slot/>
            </div>
      </div>
</template>

<script>
import MainHeader from "./Header.vue";
import { mapGetters } from "vuex";
export default {
  components: {
    MainHeader
  },

  computed: {
    ...mapGetters("global", {
      isLoggedIn: "isLoggedIn"
    })
  },

  created() {
    this.setCurrentUserFromLocalStorage();
  },

  methods: {
    setCurrentUserFromLocalStorage() {
      this.$store.dispatch("global/fetchCurrentUserFromLocalstorage");
    }
  }
};
</script>

<style>
</style>
