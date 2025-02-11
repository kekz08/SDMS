<template>
  <div class="app">
    <div class="app-wrap">
      <UserDashboardHeader />
      <div class="app-container">
        <UserDashboardSidebar :user="auth.user" />
        <ApplyContent :scholarships="scholarships" />
      </div>
      <UserDashboardFooter />
    </div>
  </div>
</template>

<script>
import UserDashboardHeader from "@/Components/UserDashboardHeader.vue";
import UserDashboardSidebar from "@/Components/UserDashboardSidebar.vue";
import UserDashboardFooter from "@/Components/UserDashboardFooter.vue";
import ApplyContent from "@/Components/ApplyContent.vue";

export default {
  components: {
    UserDashboardHeader,
    UserDashboardSidebar,
    UserDashboardFooter,
    ApplyContent,
  },

  props: {
    auth: {
      type: Object,
      required: true,
    },
    scholarships: {
      type: Array, // Ensure scholarships is an array
      required: true,
    },
  }
};
</script>

<style>
/* Global styles can be added here */

</style>