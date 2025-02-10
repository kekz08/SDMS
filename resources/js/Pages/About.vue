<template>
  <div class="app">
    <div class="app-wrap">
      <Loader v-if="loading" />
      <Header v-else />
      <Abouts v-if="!loading" />
      <Footer v-if="!loading" />
    </div>
  </div>
</template>

<script>
import Loader from "../Components/Loader.vue";
import Abouts from "../Components/Abouts.vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

export default {
  components: {
    Header,
    Loader,
    Abouts,
    Footer,
  }
};
</script>

<style scoped>
/* Optional scoped styles */
</style>
