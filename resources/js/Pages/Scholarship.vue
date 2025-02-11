<template>
  <div class="app">
    <div class="app-wrap">
      <Loader v-if="loading" />
      <Header v-else />
      <ScholarshipList v-if="!loading" />
      <Footer v-if="!loading" />
    </div>
  </div>
</template>

<script>
import Loader from "../Components/Loader.vue";
import ScholarshipList from "../Components/ScholarshipList.vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

export default {
  components: {
    Header,
    Loader,
    ScholarshipList,
    Footer,
  },
};
</script>

<style scoped>
/* Optional scoped styles */
</style>