<template>
  <!-- begin app-navbar -->
  <aside class="app-navbar">
    <!-- begin user profile section -->
    <div class="user-profile2">
      <div class="avatar">
        <img src="assets/img/avtar/02.jpg" alt="User Avatar" />
      </div>
      <div class="user-info">
        <h4>Admin Account</h4>
        <h4>Administrator Role</h4>
      </div>
    </div>
    <!-- end user profile section -->

    <!-- begin sidebar-nav -->
    <div class="sidebar-nav scrollbar scroll_light">
      <ul class="metismenu" id="sidebarNav">
        <li>
          <a href="/admin_dashboard">
            <i class="fa fa-bar-chart" aria-hidden="true"></i>
            <span>Dashboard</span>
          </a>
        </li>
        <li>
          <a href="/manage_admins">
            <i class="fas fa-users-cog" aria-hidden="true"></i>
            <span>Manage Admin Accounts</span>
          </a>
        </li>
        <!-- Dropdown section -->
        <li>
          <a @click="toggleDropdown">
            <i class="nav-icon ti ti-calendar"></i>
            <span class="nav-title">Application Management</span>
            <i :class="isDropdownOpen ? 'fas fa-chevron-up' : 'fas fa-chevron-down'" class="dropdown-icon"></i>
          </a>
          <ul v-show="isDropdownOpen">
            <li><a href="admin_approved">Approved</a></li>
            <li><a href="admin_pending">Pending</a></li>
            <li><a href="admin_rejected">Rejected</a></li>
          </ul>
        </li>
        <!-- Other menu items -->
        <li>
          <a href="/admin_educational_aid">
            <i class="fas fa-graduation-cap" aria-hidden="true"></i>
            <span>Educational Aid</span>
          </a>
        </li>
        <li>
          <a href="/admin_announcement">
            <i class="fas fa-bullhorn" aria-hidden="true"></i>
            <span>Announcement</span>
          </a>
        </li>
        <li>
          <a href="/admin_concerns">
            <i class="fas fa-exclamation-circle" aria-hidden="true"></i>
            <span>Concerns</span>
          </a>
        </li>
        <li>
          <a href="/admin_profile">
            <i class="fas fa-user" aria-hidden="true"></i>
            <span>Profile</span>
          </a>
        </li>
        <li>
          <a href="/admin_logs">
            <i class="fas fa-history" aria-hidden="true"></i>
            <span>Logs</span>
          </a>
        </li>
      </ul>
    </div>
    <!-- end sidebar-nav -->
  </aside>
  <!-- end app-navbar -->
</template>

<script>
export default {
  data() {
    return {
      isDropdownOpen: false, // Tracks whether the dropdown is open
    };
  },
  methods: {
    toggleDropdown() {
      this.isDropdownOpen = !this.isDropdownOpen; // Toggles the dropdown visibility
    },
  },
};
</script>

<style scoped>

</style>
