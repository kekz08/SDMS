<template>
  <div class="app">
    <!-- Loader (shown when loading is true) -->
    <Loader v-if="loading" />
    
    <!-- Begin header -->
    <Header v-else />

    <!-- Image slider section -->
    <div v-if="!loading" class="app-container">
      <WelcomeSlider />
    </div>

    <!-- Begin footer -->
    <Footer v-if="!loading" />
    <!-- End footer -->
  </div>
</template>

<script setup>
import { ref, onMounted } from 'vue';
import Loader from "../Components/Loader.vue";
import Header from "../Components/Header.vue";
import Footer from "../Components/Footer.vue";
import WelcomeSlider from "../Components/WelcomeSlider.vue";

// Track loading state
const loading = ref(true);

// Simulate delay for loading
onMounted(() => {
  setTimeout(() => {
    loading.value = false; // Hide loader and show content
  }, 2000); // Mock delay (2 seconds)
});
</script>
