<template>
  <aside class="app-navbar">
    <!-- begin user profile section -->
    <div class="user-profile2">
      <div class="avatar">
        <img src="assets/img/avtar/02.jpg" alt="User Avatar" />
      </div>
      <div class="user-info">
        <!-- Display the user's name -->
        <h4>{{ user.name || "Guest" }}</h4>
        <span class="verified-badge">Fully Verified</span>
      </div>
    </div>
    <!-- end user profile section -->

    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
      <ul class="metismenu" id="sidebarNav">
        <li>
          <a href="/user_dashboard">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/educational_aid">
            <i class="fas fa-folder" aria-hidden="true"></i>
            <span>Educational Aids</span>
          </a>
        </li>
        <li>
          <a href="/application_status">
            <i class="fas fa-check-circle" aria-hidden="true"></i>
            <span>Application Status</span>
          </a>
        </li>
        <li>
          <a href="/announcement">
            <i class="fas fa-bullhorn" aria-hidden="true"></i>
            <span>Announcement</span>
          </a>
        </li>
        <li>
          <a href="/concern">
            <i class="fas fa-exclamation-triangle" aria-hidden="true"></i>
            <span>Concerns</span>
          </a>
        </li>
        <li>
          <a href="/profile">
            <i class="fas fa-user" aria-hidden="true"></i>
            <span>Profile</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- end sidebar-nav -->
  </aside>
</template>

<script>
export default {
  name: "UserDashboardSidebar",
  props: {
    user: {
      type: Object,
      required: true, // Ensures the `user` prop is provided
    },
  },
};
</script>

<style scoped>
/* Add specific sidebar styles here */
</style>
