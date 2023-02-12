<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Single Product</h1>
        <a href="/products" class="btn btn-outline-warning">Back</a>
      </div>

      <form @submit.prevent="findProduct(id)">
        <input type="number" v-model.trim="id" placeholder="Enter Product Id" />
        <input
          type="submit"
          value="Search Product"
          class="btn btn-success"
          :disabled="id < 1"
        />
      </form>

      <div class="card mt-5" v-if="find">
        <div class="card-header bg-secondary">{{ product.product_name }}</div>
        <div class="card-body">{{ product.product_details }}</div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      id: null,
      find: false,
      product: {},
    };
  },
  methods: {
    findProduct(id) {
      axios.get("http://127.0.0.1:8000/api/products/" + id).then((res) => {
        this.product = res.data;
        this.find = true;
        this.id = null;
      });
    },
  },
};
</script>

<style>
</style>