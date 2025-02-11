<template>
    <div class="app">
      <div class="app-wrap">
        <AdminDashboardHeader />
        <div class="app-container">
          <AdminDashboardSidebar />
          <AdminAnnouncementContent />
        </div>
        <AdminDashboardFooter />
      </div>
    </div>
  </template>
  <script>
  import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
  import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
  import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
  import AdminAnnouncementContent from "@/Components/AdminAnnouncementContent.vue";
  
  export default {
    components: {
      AdminDashboardHeader,
      AdminDashboardSidebar,
      AdminDashboardFooter,
      AdminAnnouncementContent,
    },
    
  };
  </script>
  
  <style>
  /* Global styles can be added here */
  </style>