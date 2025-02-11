<template>
    <div class="app">
      <div class="app-wrap">
        <AdminDashboardHeader />
        <div class="app-container">
          <AdminDashboardSidebar />
          <AdminPendingContent :applications="applications"/>
        </div>
        <AdminDashboardFooter />
      </div>
    </div>
  </template>
  <script>
  import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
  import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
  import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
  import AdminPendingContent from "@/Components/AdminPendingContent.vue";
  
  export default {
    components: {
      AdminDashboardHeader,
      AdminDashboardSidebar,
      AdminDashboardFooter,
      AdminPendingContent,
    },
    props:{
      applications:{
        type: Array,
        required: true,
      }
    }
  };
  </script>
  
  <style>
  /* Global styles can be added here */
  </style>