<template>
  <button @click="addToCart()" class="btn btn-block btn-info">
    ADD TO CART
  </button>
</template>
<script>
export default {
  data() {
    return {};
  },
  props: ["userId", "productId"],
  methods: {
    async addToCart() {
      if (this.userId == 0) {
        alert("You need to logged in");
        return;
      }

      let response = await axios
        .post("/cart", {
          product_id: this.productId,
        })
        .then((res) => {
          console.log(res.data);
        });
    },
  },
};
</script>
<style>
</style>