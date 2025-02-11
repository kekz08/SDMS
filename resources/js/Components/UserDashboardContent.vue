<template>
  <!-- begin app-main -->
  <div class="app-main" id="main">
    <!-- begin container-fluid -->
    <div class="container-fluid">
      <!-- begin row for breadcrumb and title -->
      <div class="row mb-4">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item" style="padding: 5px">Dashboard</li>
              <li class="breadcrumb-item active" aria-current="page">
                Overview
              </li>
            </ol>
          </nav>
        </div>
      </div>
      <!-- end row for breadcrumb and title -->
      <div class="col-12 col-lg-6">
        <div class="card card-statistics">
          <div class="card-header">
            <div class="card-heading">
              <h1 class="display-4">DASHBOARD</h1>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6">
              <h4 class="column-header">Surigao City Applicants</h4>
              <canvas id="barChart"></canvas>
            </div>
            <div class="col-md-6">
              <h4 class="column-header">Tally of Applicants</h4>
              <canvas id="pieChart"></canvas>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- end container-fluid -->
  </div>
  <!-- end app-main -->
</template>

<script>
import {
  Chart,
  BarController,
  BarElement,
  CategoryScale,
  LinearScale,
  PieController,
  ArcElement,
  Tooltip,
  Legend,
} from "chart.js";

Chart.register(
  BarController,
  BarElement,
  CategoryScale,
  LinearScale,
  PieController,
  ArcElement,
  Tooltip,
  Legend
);

export default {
  name: "Dashboard",
  mounted() {
    this.createBarChart();
    this.createPieChart();
  },
  methods: {
    createBarChart() {
      const barCtx = document.getElementById("barChart").getContext("2d");
      new Chart(barCtx, {
        type: "bar",
        data: {
          labels: ["January", "February", "March", "April", "May", "June"],
          datasets: [
            {
              label: "Applicants",
              data: [20, 30, 15, 25, 10, 35],
              backgroundColor: "rgba(75, 192, 192, 0.2)",
              borderColor: "rgba(75, 192, 192, 1)",
              borderWidth: 1,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
              ticks: {
                color: "black",
              },
            },
            x: {
              ticks: {
                color: "black",
              },
            },
          },
          plugins: {
            legend: {
              labels: {
                color: "black",
              },
            },
            tooltip: {
              bodyColor: "black",
            },
          },
        },
      });
    },
    createPieChart() {
      const pieCtx = document.getElementById("pieChart").getContext("2d");
      new Chart(pieCtx, {
        type: "pie",
        data: {
          labels: ["Category 1", "Category 2", "Category 3", "Category 4"],
          datasets: [
            {
              data: [32, 27, 23, 18],
              backgroundColor: ["#FF6384", "#36A2EB", "#FFCE56", "#4BC0C0"],
            },
          ],
        },
        options: {
          plugins: {
            legend: {
              labels: {
                color: "black",
              },
            },
            tooltip: {
              bodyColor: "black",
            },
          },
        },
      });
    },
  },
};
</script>

<style scoped>

</style>