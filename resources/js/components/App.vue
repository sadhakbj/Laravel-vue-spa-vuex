<template>
<div class="main">
    <Header />    
    <div class="container">
      <router-view></router-view>
    </div>
  </div>
</template>

<script>
import Header from "../views/layouts/Header";
export default {
  name: "app",
  components: {
    Header
  }
};
</script>

<style>
</style>
