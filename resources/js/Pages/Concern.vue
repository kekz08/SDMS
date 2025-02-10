<template>
  <div class="app">
    <div class="app-wrap">
      <UserDashboardHeader />
      <div class="app-container">
        <UserDashboardSidebar :user="auth.user" />
        <ConcernContent />
      </div>
      <UserDashboardFooter />
    </div>
  </div>
</template>

<script>
import UserDashboardHeader from "@/Components/UserDashboardHeader.vue";
import UserDashboardSidebar from "@/Components/UserDashboardSidebar.vue";
import UserDashboardFooter from "@/Components/UserDashboardFooter.vue";
import ConcernContent from "@/Components/ConcernContent.vue";

export default {
  components: {
    UserDashboardHeader,
    UserDashboardSidebar,
    UserDashboardFooter,
    ConcernContent,
  },
  props: {
    auth: {
      type: Object,
      required: true, // Ensure the auth object is provided
    },
  },
};
</script>

<style>
/* Global styles can be added here */
</style>
