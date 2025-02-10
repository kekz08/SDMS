<template>
  <div class="app">
    <div class="app-wrap">
      <UserDashboardHeader />
      <div class="app-container">
        <UserDashboardSidebar :user="auth.user" />
        <!-- Pass scholarships and userId to EducationalAidContent -->
        <EducationalAidContent :scholarships="scholarships" :userId="auth.user.id" />
      </div>
      <UserDashboardFooter />
    </div>
  </div>
</template>

<script>
import UserDashboardHeader from "@/Components/UserDashboardHeader.vue";
import UserDashboardSidebar from "@/Components/UserDashboardSidebar.vue";
import UserDashboardFooter from "@/Components/UserDashboardFooter.vue";
import EducationalAidContent from "@/Components/EducationalAidContent.vue";

export default {
  components: {
    UserDashboardHeader,
    UserDashboardSidebar,
    UserDashboardFooter,
    EducationalAidContent,
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
  },
};
</script>
