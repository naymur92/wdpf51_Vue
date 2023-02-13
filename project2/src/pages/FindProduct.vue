<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <div class="d-flex justify-content-between align-items-center">
        <h1>Single Product</h1>
        <a href="/products" class="btn btn-outline-warning">Back</a>
      </div>

      <form @submit.prevent="findProduct()">
        <input
          type="text"
          v-model.trim="term"
          placeholder="Enter Product Name"
        />
        &nbsp;
        <input
          type="submit"
          value="Search Product"
          class="btn btn-success"
          :disabled="term.length < 1"
        />
      </form>

      <div class="row" v-if="find">
        <div class="my-2">
          Total found: <strong>{{ products.length }}</strong>
        </div>
        <div
          v-for="product in products"
          :key="product.id"
          class="col-4 card p-0 mt-5"
        >
          <div class="card-header bg-secondary">{{ product.product_name }}</div>
          <div class="card-body">{{ product.product_details }}</div>
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
      term: "",
      find: false,
      products: [],
    };
  },
  methods: {
    findProduct() {
      axios
        .post("http://127.0.0.1:8000/api/search/", { item: this.term })
        .then((res) => {
          this.products = res.data;
          this.find = true;
          this.term = "";
        });
    },
  },
};
</script>

<style>
</style>