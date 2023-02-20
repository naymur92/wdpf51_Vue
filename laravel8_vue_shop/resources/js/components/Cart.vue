<template>
  <div class="header__cart">
    <ul>
      <li>
        <a href="#"><i class="fa fa-heart"></i> <span>1</span></a>
      </li>
      <li>
        <a href="#"
          ><i class="fa fa-shopping-bag"></i> <span>{{ itemCount }}</span></a
        >
      </li>
    </ul>
    <!-- <div class="header__cart__price">item: <span>$150.00</span></div> -->
  </div>
</template>
<script>
export default {
  data() {
    return {
      itemCount: "",
    };
  },
  mounted() {
    // this.$root.$on("changeInCart", (item) => {
    //   this.itemCount = item;
    // });
  },
  methods: {
    async getCartItems() {
      let response = await axios.post("/cart");
      this.itemCount = response.data.items;
      // console.log(response);
    },
  },
  created() {
    this.getCartItems();
  },
};
</script>

<style>
</style>