<script setup>
import Header from "./layouts/Header.vue";
import Navbar from "./layouts/Navbar.vue";
import Footer from "./layouts/Footer.vue";
</script>

<template>
  <div>
    <Header />
    <Navbar />

    <router-view></router-view>

    <Footer />
  </div>
</template>
<script>
export default {};
</script>
<style>
</style>