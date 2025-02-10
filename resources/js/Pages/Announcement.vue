<template>
  <div class="app">
    <div class="app-wrap">
      <UserDashboardHeader />
      <div class="app-container">
        <UserDashboardSidebar :user="auth.user" />
        <AnnouncementContent />
      </div>
      <UserDashboardFooter />
    </div>
  </div>
</template>

<script>
import UserDashboardHeader from "@/Components/UserDashboardHeader.vue";
import UserDashboardSidebar from "@/Components/UserDashboardSidebar.vue";
import UserDashboardFooter from "@/Components/UserDashboardFooter.vue";
import AnnouncementContent from "@/Components/AnnouncementContent.vue";

export default {
  components: {
    UserDashboardHeader,
    UserDashboardSidebar,
    UserDashboardFooter,
    AnnouncementContent,
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
