<template>
  <div>

    <layout>
      <transition name="slide-fade">
        <keep-alive>
          <router-view></router-view>
        </keep-alive>
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
