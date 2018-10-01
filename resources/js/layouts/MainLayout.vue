<template>
  <div class="main">
    <main-header/>
    <div class="container">
      <slot/>
    </div>
  </div>
</template>

<script>
import MainHeader from "./Header.vue";
export default {
  components: {
    MainHeader
  },
  created() {},
  methods: {}
};
</script>

<style>
</style>
