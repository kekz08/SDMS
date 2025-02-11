<template>
  <div class="card_card" :class="cardClass">
    <i class="fas fa-users card-icon"></i>
    <div class="card-content">
      <h2>{{ count }}</h2>
      <p>{{ title }}</p>
      <a :href="link">View Details</a>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    count: {
      type: Number,
      required: true
    },
    title: {
      type: String,
      required: true
    },
    link: {
      type: String,
      required: true
    },
    cardClass: {
      type: String,
      required: true
    }
  }
};
</script>

<style scoped>
/* Add card-specific styles here */
</style>
