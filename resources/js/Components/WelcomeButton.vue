<template>
  <div class="btn-group mt-4" :style="{ marginTop: '30px' }">
    <a
      href="/register"
      class="btn btn-warning"
      :style="applyNowStyle"
    >
      Apply Now
    </a>
    <a
      href="/scholarship"
      class="btn btn-primary"
      :style="inquireStyle"
    >
      Inquire
    </a>
  </div>
</template>

<script setup>
import { reactive } from 'vue';

// Styles for the buttons
const applyNowStyle = reactive({
  padding: '12px 30px',
  fontSize: '18px',
  fontWeight: 'bold',
  marginRight: '15px',
  borderRadius: '50px',
  boxShadow: '0 4px 8px rgba(0, 0, 0, 0.2)'
});

const inquireStyle = reactive({
  padding: '12px 30px',
  fontSize: '18px',
  fontWeight: 'bold',
  borderRadius: '50px',
  boxShadow: '0 4px 8px rgba(0, 0, 0, 0.2)'
});
</script>
