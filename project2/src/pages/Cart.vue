<template>
  <div class="container mt-5">
    <div class="row justify-content-center">
      <h1>Cart List</h1>
      <!-- <p><strong>Counter: </strong>{{ $store.state.counter }}</p>
      <button @click="$store.state.counter++">Click Here</button> -->

      <ol>
        <li v-for="item in $store.state.cart" :key="item.id">
          {{ item.product_name }} - ({{ item.qty }})
        </li>
      </ol>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {
    // console.log($store.state.cart);
  },
};
</script>
<style>
</style>