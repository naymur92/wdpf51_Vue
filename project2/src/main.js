import { createApp } from "vue";

import App from "./App.vue";
import App1 from "./App1.vue";
import Reactivity from "./Reactivity.vue";
import Reactivity3 from "./Reactivity3.vue";
import Computed1 from "./Computed1.vue";
import StyleBinding1 from "./StyleBinding1.vue";
import ListRendering from "./ListRendering.vue";
import Event1 from "./Event1.vue";
import Event2 from "./Event2.vue";
import FormBindings from "./FormBindings.vue";
import Templating from "./Templating.vue";
import VueCtkDateTimePicker from "vue-ctk-date-time-picker";
import "vue-ctk-date-time-picker/dist/vue-ctk-date-time-picker.css";

import router from "./router/index";

import { createStore } from "vuex";
const store = createStore({
  state() {
    return {
      counter: 0,
      cart: [],
    };
  },
  mutations: {
    addToCart(state, product) {
      const exist = state.cart.find((x) => x.id === product.id);
      if (exist) {
        state.cart = state.cart.map((x) =>
          x.id === product.id ? { ...exist, qty: exist.qty + 1 } : x
        );
      } else {
        state.cart = [...state.cart, { ...product, qty: 1 }];
      }
    },
  },
});

const app = createApp(Templating);
app.component("VueCtkDateTimePicker", VueCtkDateTimePicker);

app.use(router);
app.use(store);
app.mount("#app");
