<template>

<div>
      <h1>This is a dashbaord</h1>
      <pre>{{currentUser}}</pre>
</div>
</template>

<script>
import { mapState } from "vuex";
export default {
  name: "dashboard",

  computed: {
    ...mapState("global", {
      // key => yeta rakhne naam , value => uta k xa
      currentUser: "currentUser"
    })
  }
};
</script>
<style>
</style>
