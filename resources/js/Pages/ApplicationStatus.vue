<template>
  <div class="app">
    <div class="app-wrap">
      <UserDashboardHeader />
      <div class="app-container">
        <UserDashboardSidebar :user="auth.user" />
        <ApplicationStatusContent :applications="applications" />
      </div>
      <UserDashboardFooter />
    </div>
  </div>
</template>

<script>
import UserDashboardHeader from "@/Components/UserDashboardHeader.vue";
import UserDashboardSidebar from "@/Components/UserDashboardSidebar.vue";
import UserDashboardFooter from "@/Components/UserDashboardFooter.vue";
import ApplicationStatusContent from "@/Components/ApplicationStatusContent.vue";

export default {
  components: {
    UserDashboardHeader,
    UserDashboardSidebar,
    UserDashboardFooter,
    ApplicationStatusContent,
  },
  props: {
    auth: {
      type: Object,
      required: true, // Ensure the auth object is provided
    },
    applications: {
      type: Array, // Ensure applications is an array
      required: true, // Ensure applications is provided
    },
  },
};
</script>

<style>
/* Global styles can be added here */
</style>
