<template>
  <div class="login-container">
    <div class="col-12 col-sm-11 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
      <div class="signup-wrapper">
        <!-- Signup Header -->
        <div class="signup-wrapper-header text-center">
          <h2 class="signup-title">Sign In</h2>
        </div>
        
        <!-- Signup Body -->
        <div class="signup-wrapper-body">
          <div class="signup-body-header text-center mb-45">
            <a href="user_dashboard.html" class="gbutton">
              <i class="icofont-google-plus"></i> Login With Google
            </a>
          </div>

          <div class="signup-body-content">
            <!-- Form Start -->
            <form @submit.prevent="submit">
              <!-- Username or Email Input -->
              <div class="sign-single-input mb-25">
                <label>Username Or Email</label>
                <div class="sign-input">
                  <input 
                    type="email" 
                    v-model="form.email" 
                    placeholder="Username Or Email" 
                    :class="{'is-invalid': form.errors.email}"
                  />
                  <i class="icofont-ui-message"></i>
                </div>
                <div v-if="form.errors.email" class="error-message">
                  {{ form.errors.email }}
                </div>
              </div>

              <!-- Password Input -->
              <div class="sign-single-input mb-25">
                <label>Password</label>
                <div class="sign-input">
                  <input 
                    type="password" 
                    v-model="form.password" 
                    placeholder="Password" 
                    :class="{'is-invalid': form.errors.password}"
                  />
                  <i class="icofont-lock"></i>
                </div>
                <div v-if="form.errors.password" class="error-message">
                  {{ form.errors.password }}
                </div>
              </div>

              <!-- Remember Me Checkbox -->
              <div class="sign-single-input mb-25">
                <input type="checkbox" id="terms" v-model="form.remember">
                <label for="terms"><span>Remember me</span></label>
              </div>

              <!-- Sign In and Forgot Password Links -->
              <div class="sign-buttons text-center mt-45">
                <button type="submit" class="def-btn mb-30" :disabled="form.processing">Sign In</button>
                <span class="signtext d-block">
                  <a v-if="canResetPassword" :href="route('password.request')">Forgot Your Password?</a>
                </span>
              </div>
            </form>
            <!-- Form End -->
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';

// Props
defineProps({
  canResetPassword: {
    type: Boolean,
  },
  status: {
    type: String,
  },
});

// Form setup
const form = useForm({
  email: '',
  password: '',
  remember: false,
});

// Submit form logic
const submit = () => {
  form.post(route('login'), {
    onFinish: () => form.reset('password'),
  });
};
</script>

<style scoped>
/* Add custom styles for the login form */
.signup-wrapper {
  padding: 30px;
  background: #fff;
  border-radius: 8px;
}

.signup-title {
  font-size: 2rem;
  color: #333;
}

.signup-body-content .sign-single-input {
  margin-bottom: 20px;
}

.signup-body-content .sign-input input {
  width: 100%;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 1rem;
}

.signup-body-content .error-message {
  color: red;
  font-size: 0.875rem;
}

.def-btn {
  font-size: 18px;
  background-color: #f5a623;
  color: #fff;
  cursor: pointer;
}

.def-btn:hover {
  background-color: #f39c12;
}
.signup-title[data-v-25e3fb76] {
    font-size: 2rem;
    color: #fff;
}
.sign-input {
    position: relative;
    z-index: 1;
}
</style>