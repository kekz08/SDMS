<template>
  <div class="card">
    <div class="card-body">
      <h5 class="card-title text-center">{{ title }}</h5>
      <canvas :id="chartId"></canvas>
    </div>
  </div>
</template>

<script>
import { onMounted } from "vue";
import Chart from "chart.js/auto";

export default {
  props: {
    title: {
      type: String,
      required: true
    },
    chartId: {
      type: String,
      required: true
    },
    chartType: {
      type: String,
      required: true
    },
    chartData: {
      type: Object,
      required: true
    },
    chartOptions: {
      type: Object,
      required: true
    }
  },
  setup(props) {
    onMounted(() => {
      const ctx = document.getElementById(props.chartId).getContext("2d");
      new Chart(ctx, {
        type: props.chartType,
        data: props.chartData,
        options: props.chartOptions
      });
    });
  }
};
</script>

<style scoped>
/* Add chart-specific styles here */
</style>
