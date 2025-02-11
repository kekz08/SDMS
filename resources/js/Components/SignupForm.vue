<template>
  <div class="signup-container">
    <div class="col-12 col-sm-11 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
      <div class="signup-wrapper">
        <div class="signup-wrapper-header text-center">
          <h2 class="signup-title">Sign up</h2>
        </div>

        <div class="signup-wrapper-body">
          <form @submit.prevent="submit">
            <div class="signup-body-content">
              <div class="sign-single-input mb-25">
                <label>Name</label>
                <div class="sign-input">
                  <input
                    type="text"
                    v-model="form.name"
                    placeholder="Name"
                    :class="{ 'is-invalid': errors.name }"
                  />
                  <i class="icofont-user"></i>
                </div>
                <div v-if="errors.name" class="error-message">{{ errors.name }}</div>
              </div>

              <div class="sign-single-input mb-25">
                <label>Email</label>
                <div class="sign-input">
                  <input
                    type="email"
                    v-model="form.email"
                    placeholder="Email"
                    :class="{ 'is-invalid': errors.email }"
                  />
                  <i class="icofont-ui-message"></i>
                </div>
                <div v-if="errors.email" class="error-message">{{ errors.email }}</div>
              </div>

              <div class="sign-single-input mb-25">
                <label>Password</label>
                <div class="sign-input">
                  <input
                    type="password"
                    v-model="form.password"
                    placeholder="Password"
                    :class="{ 'is-invalid': errors.password }"
                  />
                  <i class="icofont-lock"></i>
                </div>
                <div v-if="errors.password" class="error-message">
                  {{ errors.password }}
                </div>
              </div>

              <div class="sign-single-input mb-25">
                <label>Confirm Password</label>
                <div class="sign-input">
                  <input
                    type="password"
                    v-model="form.password_confirmation"
                    placeholder="Confirm Password"
                    :class="{ 'is-invalid': errors.password_confirmation }"
                  />
                  <i class="icofont-lock"></i>
                </div>
                <div v-if="errors.password_confirmation" class="error-message">
                  {{ errors.password_confirmation }}
                </div>
              </div>

              <div class="sign-buttons text-center mt-45">
                <button type="submit" class="def-btn mb-30">
                  CREATE AN ACCOUNT
                </button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({
  form: Object, // Form object from the parent
  submit: Function, // Submit handler passed down
  errors: Object, // Errors passed down
});
</script>

<style scoped>
/* Existing styles from your SignupForm.vue */
</style>