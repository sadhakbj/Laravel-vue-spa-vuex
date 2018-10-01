<template>
      <div class="card">
            <div class="card-header">
                  <slot name="title"></slot>
            </div>
            <div class="card-body">
                  <slot name="body"></slot>
            </div>
      </div>
</template>

<script>
export default {
  name: "card"
};
</script>

<style>
</style>
