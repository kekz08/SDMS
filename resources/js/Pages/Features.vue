<template>
  <div class="app">
    <div class="app-wrap">
      <Loader v-if="loading" />
      <Header v-else />
      <FeatureList v-if="!loading" />
      <Footer v-if="!loading" />
    </div>
  </div>
</template>

<script>
import Loader from "../Components/Loader.vue";
import FeatureList from "../Components/FeatureList.vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

export default {
  components: {
    Header,
    Loader,
    FeatureList,
    Footer,
  },
};
</script>

<style scoped>
/* Optional scoped styles */
</style>