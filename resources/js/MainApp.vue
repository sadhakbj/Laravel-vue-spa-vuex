<template>
  <div>

    <layout>
      <transition name="slide-fade">
          <router-view></router-view>
      </transition>
    </layout>

  </div>
</template>

<script>
import Layout from "./layouts/MainLayout";
export default {
  name: "app",
  components: {
    Layout
  }
};
</script>

<style>
</style>
