<template>
    <div class="app">
      <div class="app-wrap">
        <AdminDashboardHeader />
        <div class="app-container">
          <AdminDashboardSidebar />
          <AdminProfileContent />
        </div>
        <AdminDashboardFooter />
      </div>
    </div>
  </template>
  <script>
  import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
  import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
  import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
  import AdminProfileContent from "@/Components/AdminProfileContent.vue";
  
  export default {
    components: {
      AdminDashboardHeader,
      AdminDashboardSidebar,
      AdminDashboardFooter,
      AdminProfileContent,
    },
    
  };
  </script>
  
  <style>
  /* Global styles can be added here */
  </style>