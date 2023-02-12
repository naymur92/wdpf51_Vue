<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Products Page</h1>
        <a href="/products/find" class="btn btn-outline-primary"
          >Find Product</a
        >
      </div>

      <div class="row">
        <div class="col-4 my-2" v-for="item in products" :key="item.id">
          <div class="card">
            <div class="card-header bg-secondary">
              <h5 class="text-light">{{ item.product_name }}</h5>
            </div>
            <div class="card-body">
              <p>{{ item.product_details }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <button class="btn btn-success">Edit</button>
              <button class="btn btn-danger">Delete</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  data() {
    return {
      products: [],
    };
  },
  mounted() {
    axios.get("http://127.0.0.1:8000/api/products").then((res) => {
      this.products = res.data;
    });
  },
};
</script>

<style>
</style>