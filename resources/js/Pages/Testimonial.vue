<template>
  <div class="app">
    <div class="app-wrap">
      <Loader v-if="loading" />
      <Header v-else />
      <TestimonialSlider v-if="!loading" />
      <Footer v-if="!loading" />
    </div>
  </div>
</template>

<script>
import Loader from "../Components/Loader.vue";
import TestimonialSlider from "../Components/TestimonialSlider.vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";

export default {
  components: {
    Header,
    Loader,
    TestimonialSlider,
    Footer,
  },
  data() {
    return {
      loading: false, // or set to true and change when loading is done
    };
  },
};
</script>

<style scoped>
/* Optional scoped styles */
</style>
