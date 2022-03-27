<template>
  <div>
    <header-app />
    <router-view></router-view>
  </div>
</template>

<script>
import Header from './components/Header.vue'
export default {
  components: {
    'header-app': Header,
  },
}
</script>

<style scoped>
.container-fluid {
  height: 50px;
}
</style>