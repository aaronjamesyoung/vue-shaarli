import Vue from "vue";
import Router from "vue-router";

import LinkList from "../components/LinkList";

import config from "../config";

Vue.use(Router);

// Routing Setup
export default new Router({
  mode: "history",
  base: window.location.pathname,
  routes: [
    {
      path: "/",
      component: LinkList,
      props: { config }
    }
  ]
});
