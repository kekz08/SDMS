<template>
  <header class="app-header top-bar">
    <nav class="navbar navbar-expand-md">
      <div class="navbar-header d-flex align-items-center">
        <a href="javascript:void(0)" class="mobile-toggle">
          <i class="ti ti-align-right"></i>
        </a>
        <a class="navbar-brand" href="index.html">
          SDMS
          <img src="assets/images/sdms-logo.png" class="img-fluid logo-desktop" alt="logo" />
          <img src="assets/images/sdms-logo.png" class="img-fluid logo-mobile" alt="logo" />
        </a>
      </div>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <i class="ti ti-align-left"></i>
      </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navigation d-flex">
          <ul class="navbar-nav nav-right ml-auto">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle"
                href="javascript:void(0)"
                id="navbarDropdown3"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <i class="fe fe-bell"></i>
                <span class="notify">
                  <span class="blink"></span>
                  <span class="dot"></span>
                </span>
              </a>
              <div
                class="dropdown-menu extended animated fadeIn"
                aria-labelledby="navbarDropdown"
              >
                <ul>
                  <li class="dropdown-header bg-gradient p-4 text-white text-left">
                    Notifications
                    <a
                      href="#"
                      class="float-right btn btn-square btn-inverse-light btn-xs m-0"
                    >
                      <span class="font-13">Clear all</span>
                    </a>
                  </li>
                  <li class="dropdown-body min-h-240 nicescroll">
                    <ul class="scrollbar scroll_dark max-h-240">
                      <li v-for="notification in notifications" :key="notification.id">
                        <a href="javascript:void(0)">
                          <div class="notification d-flex flex-row align-items-center">
                            <div class="notify-icon bg-img align-self-center">
                              <div :class="['bg-type bg-type-md', notification.bgTypeClass]">
                                <span>{{ notification.initials }}</span>
                              </div>
                            </div>
                            <div class="notify-message">
                              <p class="font-weight-bold">{{ notification.message }}</p>
                              <small>{{ notification.time }}</small>
                            </div>
                          </div>
                        </a>
                      </li>
                    </ul>
                  </li>
                  <li class="dropdown-footer">
                    <a class="font-13" href="javascript:void(0)">
                      View All Notifications
                    </a>
                  </li>
                </ul>
              </div>
            </li>
            <li class="nav-item dropdown user-profile">
              <a
                href="javascript:void(0)"
                class="nav-link dropdown-toggle"
                id="navbarDropdown4"
                role="button"
                data-toggle="dropdown"
                aria-haspopup="true"
                aria-expanded="false"
              >
                <img src="/assets/img/avtar/02.jpg" alt="avtar-img" />
                <span class="bg-success user-status"></span>
              </a>
              <div class="dropdown-menu animated fadeIn">
                <div class="bg-gradient px-4 py-3">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="mr-1">
                      <h4 class="text-white mb-0">John Doe</h4>
                      <small class="text-white">doejohn@example.com</small>
                    </div>
                    <!-- Logout Button -->
                    <button
                      @click.prevent="logout"
                      class="text-white font-20 tooltip-wrapper"
                      data-toggle="tooltip"
                      data-placement="top"
                      title="Logout"
                    >
                      <i class="zmdi zmdi-power"></i>
                    </button>
                  </div>
                </div>
                <div class="p-4">
                  <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                    <i class="fa fa-user pr-2 text-success"></i> Profile
                  </a>
                  <a class="dropdown-item d-flex nav-link" href="javascript:void(0)">
                    <i class="ti ti-settings pr-2 text-info"></i> Settings
                  </a>
                  <a class="dropdown-item d-flex nav-link" href="concern.html">
                    <i class="fa fa-compass pr-2 text-warning"></i> Need help?
                  </a>
                </div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </header>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
  name: "AppHeader",
  data() {
    return {
      notifications: [
        { id: 1, initials: "HY", message: "New registered user", time: "Just now", bgTypeClass: "" },
        { id: 2, initials: "GM", message: "New invoice received", time: "22 min", bgTypeClass: "bg-success" },
        { id: 3, initials: "FR", message: "Server error report", time: "7 min", bgTypeClass: "bg-danger" },
        { id: 4, initials: "HT", message: "Database report", time: "1 day", bgTypeClass: "bg-info" },
        { id: 5, initials: "DE", message: "Order confirmation", time: "2 day", bgTypeClass: "" },
      ],
    };
  },
  methods: {
    logout() {
      const form = useForm();
      // Make sure the form is posting to the correct route
      console.log('Logging out...');
      form.post(route('logout'));
    },
  },
};
</script>

<style scoped>
</style>
