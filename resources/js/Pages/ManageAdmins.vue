<template>
  <div class="app">
    <div class="app-wrap">
      <AdminDashboardHeader />
      <div class="app-container">
        <AdminDashboardSidebar />
        <ManageAdminContent :admins="users" /> <!-- Pass the users prop here -->
      </div>
      <AdminDashboardFooter />
    </div>
  </div>
</template>

<script>
import AdminDashboardHeader from "@/Components/AdminDashboardHeader.vue";
import AdminDashboardSidebar from "@/Components/AdminDashboardSidebar.vue";
import AdminDashboardFooter from "@/Components/AdminDashboardFooter.vue";
import ManageAdminContent from "@/Components/ManageAdminContent.vue";

export default {
  components: {
    AdminDashboardHeader,
    AdminDashboardSidebar,
    AdminDashboardFooter,
    ManageAdminContent
  },
  props: {
    users: Array // Define that this component receives a "users" prop from Inertia
  }
};
</script>

<style>
/* Global styles can be added here */
</style>
