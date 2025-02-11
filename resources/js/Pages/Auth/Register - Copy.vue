<template>
  <div class="app">
    <div class="app-wrap">
      <Loader v-if="loading" />
      <Header v-else />
      <SignupForm v-if="!loading" />
      <Footer v-if="!loading" />
    </div>
  </div>
</template>

<script>
import Loader from "@/Components/Loader.vue";
import SignupForm from "@/Components/SignupForm.vue";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";

export default {
  components: {
    Header,
    Loader,
    SignupForm,
    Footer,
  },
};

const form = useForm({
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
});

const submit = () => {
    form.post(route('register'), {
        onFinish: () => form.reset('password', 'password_confirmation'),
    });
};
</script>

<style scoped>
/* Optional scoped styles */
</style>