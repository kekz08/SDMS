<template>
  <div class="app">
    <div class="app-wrap">
      <AdminDashboardHeader />
      <div class="app-container">
        <AdminDashboardSidebar />
        <AdminApprovedContent :applications="applications" :scholarships="scholarships"/>
      </div>
      <AdminDashboardFooter />
    </div>
  </div>
</template>
<script>
import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
import AdminApprovedContent from "@/Components/AdminApprovedContent.vue";

export default {
  components: {
    AdminDashboardHeader,
    AdminDashboardSidebar,
    AdminDashboardFooter,
    AdminApprovedContent,
  },
  props:{
    applications:{
      type: Array,
      required: true,
    },
    scholarships:{
      type: Array,
      required: true,
    }
  }
};
</script>

<style>
/* Global styles can be added here */
</style>