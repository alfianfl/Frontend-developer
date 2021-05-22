import Vue from "vue";
import App from "./App.vue";
import router from "./router";
import store from "./store";
import vuetify from "./plugins/vuetify";
// import VueSplide from "@splidejs/vue-splide";

Vue.config.productionTip = false;

// Vue.use(VueSplide);

new Vue({
  router,
  store,
  vuetify,
  render: h => h(App)
}).$mount("#app");
