require("./bootstrap");

import { createApp } from "vue";
import AddToCart from "./components/AddToCart.vue";
import Cart from "./components/Cart.vue";

const app = createApp({});

// app.use(router);
app.component("add-to-cart", AddToCart);
app.component("cart", Cart);
app.mount("#app");
