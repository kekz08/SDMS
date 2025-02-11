<template>
    <div class="login-container">
        <div class="col-12 col-sm-11 col-md-10 col-lg-8 col-xl-7 col-xxl-6">
            <div class="signup-wrapper">
                <!-- Login Header -->
                <div class="signup-wrapper-header text-center">
                    <h2 class="signup-title">Sign In</h2>
                </div>

                <!-- Login Body -->
                <div class="signup-wrapper-body">
                    <div class="signup-body-header text-center mb-45">
                        <a href="#" class="gbutton">
                            <i class="icofont-google-plus"></i> Login With Google
                        </a>
                    </div>

                    <form @submit.prevent="submit">
                        <div class="signup-body-content">
                            <!-- Email Input -->
                            <div class="sign-single-input mb-25">
                                <label for="email">Email</label>
                                <div class="sign-input">
                                    <input
                                        id="email"
                                        type="email"
                                        v-model="form.email"
                                        placeholder="Username or Email"
                                        :class="{ 'is-invalid': form.errors.email }"
                                    />
                                    <i class="icofont-ui-message"></i>
                                </div>
                                <div v-if="form.errors.email" class="error-message">
                                    {{ form.errors.email }}
                                </div>
                            </div>

                            <!-- Password Input -->
                            <div class="sign-single-input mb-25">
                                <label for="password">Password</label>
                                <div class="sign-input">
                                    <input
                                        id="password"
                                        type="password"
                                        v-model="form.password"
                                        placeholder="Password"
                                        :class="{ 'is-invalid': form.errors.password }"
                                    />
                                    <i class="icofont-lock"></i>
                                </div>
                                <div v-if="form.errors.password" class="error-message">
                                    {{ form.errors.password }}
                                </div>
                            </div>

                            <!-- Remember Me Checkbox -->
                            <div class="sign-single-input mb-25">
                                <label class="flex items-center">
                                    <input
                                        id="rememberMe"
                                        type="checkbox"
                                        v-model="form.remember"
                                    />
                                    <span class="ms-2">Remember me</span>
                                </label>
                            </div>

                            <!-- Sign In and Forgot Password -->
                            <div class="sign-buttons text-center mt-45">
                                <button
                                    class="def-btn mb-30"
                                    :class="{ 'opacity-25': form.processing }"
                                    :disabled="form.processing"
                                >
                                    Sign In
                                </button>
                                <span class="signtext d-block">
                  <a href="#" class="forgot-password-link">Forgot Your Password?</a>
                </span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

// Form fields using Inertia's `useForm`
const form = useForm({
    email: "",
    password: "",
    remember: false,
});

// Function to handle form submission
const submit = () => {
    form.post(route("login"), {
        onFinish: () => form.reset("password"),
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
