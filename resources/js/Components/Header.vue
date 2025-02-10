<!-- components/Header.vue -->
<template>
  <header class="app-header top-bar">
    <nav class="navbar navbar-expand-md">
      <a class="navbar-brand" href="/">
        <img
          src="assets/images/sdms-logo.png"
          alt="SDMS Logo"
          style="width: 50px; height: 50px"
        />
        <span class="site-title">SDMS</span>
      </a>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item"><a class="nav-link" href="/">Home</a></li>
          <li class="nav-item">
            <a class="nav-link" href="/scholarship">Scholarship</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/features">Features</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/testimonials">Testimonials</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/about">About</a>
          </li>
        </ul>
        <a href="/login" class="login-btn">Login</a>
      </div>
    </nav>
  </header>
</template>

<script setup>
</script>

<style scoped>

</style>