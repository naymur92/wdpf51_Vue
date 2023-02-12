<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1>News Page</h1>

      <div v-for="post in posts" :key="post.id">
        <h2>Post No: {{ post.id }}</h2>
        <h5>{{ post.title }}</h5>
        <p>{{ post.body }}</p>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      posts: [],
    };
  },
  mounted() {
    axios.get("https://jsonplaceholder.typicode.com/posts").then((res) => {
      this.posts = res.data;
    });
  },
};
</script>

<style>
</style>