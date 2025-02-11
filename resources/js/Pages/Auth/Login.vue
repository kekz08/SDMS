<template>
    <div class="app">
        <div class="app-wrap">
            <Loader v-if="loading" />
            <Header v-else />
            <LoginComponents v-if="!loading" />
            <Footer v-if="!loading" />
        </div>
    </div>
</template>

<script>
import Loader from "@/Components/Loader.vue";
import LoginComponents from "@/Components/LoginComponents.vue";
import Header from "@/Components/Header.vue";
import Footer from "@/Components/Footer.vue";

export default {
    components: {
        Header,
        Loader,
        LoginComponents,
        Footer,
    },
};
</script>

<style scoped>
/* Optional scoped styles */
</style>
