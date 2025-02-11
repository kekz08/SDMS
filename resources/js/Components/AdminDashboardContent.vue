<template>
  <div class="app-main" id="main">
    <div class="container-fluid">
      <!-- Status Cards -->
      <div class="card-container">
        <CardComponent
          :count="approvedCount"
          title="Approved"
          link="admin_approved"
          cardClass="approved-card"
        />
        <CardComponent
          :count="pendingCount"
          title="Pending"
          link="admin_pending"
          cardClass="pending-card"
        />
        <CardComponent
          :count="rejectedCount"
          title="Rejected"
          link="admin_rejected"
          cardClass="rejected-card"
        />
      </div>

      <!-- Applicants per Department Bar Chart -->
      <div class="row mb-4">
        <div class="col-md-12">
          <ChartComponent
            title="Applicants per Department"
            chartId="departmentChart"
            chartType="bar"
            :chartData="departmentData"
            :chartOptions="chartOptions"
          />
        </div>
      </div>

      <!-- Applicants per Municipality and Pie Chart -->
      <div class="row">
        <div class="col-md-8">
          <ChartComponent
            title="Applicants per Municipality"
            chartId="municipalityChart"
            chartType="bar"
            :chartData="municipalityData"
            :chartOptions="chartOptions"
          />
        </div>
        <div class="col-md-4">
          <ChartComponent
            title="Application Status Breakdown"
            chartId="statusPieChart"
            chartType="pie"
            :chartData="statusPieData"
            :chartOptions="pieOptions"
          />
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import CardComponent from "./CardComponent.vue";
import ChartComponent from "./ChartComponent.vue";

export default {
  components: {
    CardComponent,
    ChartComponent,
  },
  props: {
    applications: {
      type: Array,
      required: true,
    },
  },
  computed: {
    pendingCount() {
      return this.applications.filter(
        (application) => application.status === "Pending"
      ).length;
    },
    approvedCount() {
      return this.applications.filter(
        (application) => application.status === "Approved"
      ).length;
    },
    rejectedCount() {
      return this.applications.filter(
        (application) => application.status === "Rejected"
      ).length;
    },
  },
  data() {
    return {
      departmentData: {
        labels: ["CET", "COT", "CAS", "CTE"],
        datasets: [
          {
            label: "Applicants",
            data: [56, 35, 23, 50],
            backgroundColor: ["#7FFFD4", "#9370DB", "#7FFF00", "#FF69B4"],
            borderWidth: 1,
          },
        ],
      },
      municipalityData: {
        labels: [
          "Bacuag",
          "Placer",
          "Sison",
          "San Francisco",
          "Malimono",
          "Surigao City",
        ],
        datasets: [
          {
            label: "Applicants",
            data: [40, 61, 54, 14, 11, 93],
            backgroundColor: [
              "#4682B4",
              "#00CED1",
              "#20B2AA",
              "#FF8C00",
              "#CD5C5C",
              "#8A2BE2",
            ],
            borderWidth: 1,
          },
        ],
      },
      statusPieData: {
        labels: ["Pending", "Approved", "Rejected"],
        datasets: [
          {
            data: [50, 30, 20],
            backgroundColor: ["#FFCE56", "#36A2EB", "#FF6384"],
            hoverOffset: 4,
          },
        ],
      },
      chartOptions: {
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
            titleColor: "black",
            bodyColor: "black",
          },
        },
      },
      pieOptions: {
        plugins: {
          legend: {
            labels: {
              color: "black",
            },
          },
          tooltip: {
            titleColor: "black",
            bodyColor: "black",
          },
        },
      },
    };
  },
};
</script>
