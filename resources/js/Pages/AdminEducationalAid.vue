<template>
    <div class="app">
      <div class="app-wrap">
        <AdminDashboardHeader />
        <div class="app-container">
          <AdminDashboardSidebar />
          <AdminEducationalAidContent :scholarships="scholarships"/>
        </div>
        <AdminDashboardFooter />
      </div>
    </div>
  </template>
  <script>
  import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
  import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
  import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
  import AdminEducationalAidContent from "@/Components/AdminEducationalAidContent.vue";
import Scholarship from "./Scholarship.vue";
  
  export default {
    components: {
      AdminDashboardHeader,
      AdminDashboardSidebar,
      AdminDashboardFooter,
      AdminEducationalAidContent,
    },
    props:{
        scholarships: Array
    }
  };
  </script>
  
  <style>
  /* Global styles can be added here */
  </style>