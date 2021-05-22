import Vue from "vue";
import VueRouter from "vue-router";
import Homepage from "../views/Homepage.vue";
import Checkout from "../views/Checkout.vue";
import Payment from "../views/Payment.vue";
import Signin from "../views/Signin.vue";
import Signup from "../views/Signup.vue";
import Account from "../views/Account.vue";
import Flashsale from "../views/Flashsale.vue";

Vue.use(VueRouter);

const routes = [
  {
    path: "/",
    name: "Homepage",
    component: Homepage
  },
  {
    path: "/signin",
    name: "Signin",
    component: Signin
  },
  {
    path: "/signup",
    name: "Signup",
    component: Signup
  },
  {
    path: "/checkout",
    name: "Checkout",
    component: Checkout
  },
  {
    path: "/payment",
    name: "Payment",
    component: Payment
  },
  {
    path: "/flashsale",
    name: "Flashsale",
    component:Flashsale
  },
  {
    path: "/account",
    name: "Account",
    component: Account
  }
];

const router = new VueRouter({
  mode: "history",
  base: process.env.BASE_URL,
  routes
});

export default router;
