<template>
  <div class="signup-container">
    <div class="col-12 col-sm-11 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
      <div class="signup-wrapper">
        <!-- Signup Header -->
        <div class="signup-wrapper-header text-center">
          <h2 class="signup-title">Sign up</h2>
        </div>

        <!-- Signup Body -->
        <div class="signup-wrapper-body">
          <div class="signup-body-header text-center mb-45">
            <a href="login.html" class="gbutton">
              <i class="icofont-google-plus"></i> Sign Up With Google
            </a>
          </div>

          <div class="signup-body-content">
            <!-- Email Input -->
            <div class="sign-single-input mb-25">
              <label>Email</label>
              <div class="sign-input">
                <input 
                  type="email" 
                  v-model="email" 
                  placeholder="Email" 
                  :class="{'is-invalid': emailError}"
                />
                <i class="icofont-ui-message"></i>
              </div>
              <div v-if="emailError" class="error-message">
                Please enter a valid email address.
              </div>
            </div>

            <!-- Username Input -->
            <div class="sign-single-input mb-25">
              <label>Username</label>
              <div class="sign-input">
                <input 
                  type="text" 
                  v-model="username" 
                  placeholder="Username" 
                  :class="{'is-invalid': usernameError}"
                />
                <i class="icofont-ui-message"></i>
              </div>
              <div v-if="usernameError" class="error-message">
                Username is required.
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
                Password must be at least 6 characters long.
              </div>
            </div>

            <!-- Confirm Password Input -->
            <div class="sign-single-input mb-25">
              <label>Confirm Password</label>
              <div class="sign-input">
                <input 
                  type="password" 
                  v-model="confirmPassword" 
                  placeholder="Confirm Password" 
                  :class="{'is-invalid': confirmPasswordError}"
                />
                <i class="icofont-lock"></i>
              </div>
              <div v-if="confirmPasswordError" class="error-message">
                Passwords do not match.
              </div>
            </div>

            <!-- Create Account Button -->
            <div class="sign-buttons text-center mt-45">
              <button @click="handleSignup" class="def-btn mb-30">
                CREATE AN ACCOUNT
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script setup>
import { ref } from 'vue';

// Form fields
const email = ref('');
const username = ref('');
const password = ref('');
const confirmPassword = ref('');

// Error flags
const emailError = ref(false);
const usernameError = ref(false);
const passwordError = ref(false);
const confirmPasswordError = ref(false);

// Handle form submission
const handleSignup = () => {
  emailError.value = !email.value.includes('@');
  usernameError.value = !username.value;
  passwordError.value = password.value.length < 6;
  confirmPasswordError.value = password.value !== confirmPassword.value;

  if (!emailError.value && !usernameError.value && !passwordError.value && !confirmPasswordError.value) {
    // Perform signup logic, e.g., API call
    console.log('Signup successful!');
  }
};
</script>

<style scoped>
.signup-container {
    margin-top: 135px;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
}

.signup-title {
  font-size: 2rem;
  color: #fff;
}

.sign-single-input {
  margin-bottom: 25px;
}

.sign-input input {
  width: 100%;
  border-radius: 5px;
  border: 1px solid #ddd;
  font-size: 1rem;
}

.error-message {
  color: red;
  font-size: 0.875rem;
}

.def-btn {
  font-size: 18px;
  background-color: #f5a623;
  color: #fff;
  cursor: pointer;
  border: none;
}

.def-btn:hover {
  background-color: #f39c12;
}
</style>