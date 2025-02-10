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
            <!-- Username or Email Input -->
            <div class="sign-single-input mb-25">
              <label>Username Or Email</label>
              <div class="sign-input">
                <input 
                  type="email" 
                  v-model="email" 
                  placeholder="Username Or Email" 
                  :class="{'is-invalid': emailError}"
                />
                <i class="icofont-ui-message"></i>
              </div>
              <div v-if="emailError" class="error-message">
                Please enter a valid email address.
              </div>
            </div>

            <!-- Password Input -->
            <div class="sign-single-input mb-25">
              <label>Password</label>
              <div class="sign-input">
                <input 
                  type="password" 
                  v-model="password" 
                  placeholder="Password" 
                  :class="{'is-invalid': passwordError}"
                />
                <i class="icofont-lock"></i>
              </div>
              <div v-if="passwordError" class="error-message">
                Please enter a password.
              </div>
            </div>

            <!-- Remember Me Checkbox -->
            <div class="sign-single-input mb-25">
              <input type="checkbox" id="terms" v-model="rememberMe">
              <label for="terms"><span>Remember me</span></label>
            </div>

            <!-- Sign In and Forgot Password Links -->
            <div class="sign-buttons text-center mt-45">
              <button @click="handleSubmit" class="def-btn mb-30">Sign In</button>
              <span class="signtext d-block"><a href="#">Forgot Your Password?</a></span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Reactive data for the login form
const email = ref('');
const password = ref('');
const rememberMe = ref(false);

// Error messages for validation
const emailError = ref(false);
const passwordError = ref(false);

// Function to handle form submission
const handleSubmit = () => {
  emailError.value = !email.value || !email.value.includes('@');
  passwordError.value = !password.value;

  if (!emailError.value && !passwordError.value) {
    // Proceed with login
    console.log("Form submitted successfully!");
    // You can add actual login logic here, e.g., sending data to an API
  }
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
  padding: 10px;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 1rem;
}

.signup-body-content .error-message {
  color: red;
  font-size: 0.875rem;
}

.def-btn {
  padding: 12px 30px;
  font-size: 18px;
  background-color: #f5a623;
  color: #fff;
  border-radius: 50px;
  cursor: pointer;
}

.def-btn:hover {
  background-color: #f39c12;
}
</style>
