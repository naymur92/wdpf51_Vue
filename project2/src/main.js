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

import router from "./router/index";

createApp(Templating).use(router).mount("#app");
