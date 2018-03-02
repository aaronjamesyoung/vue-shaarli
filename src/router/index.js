import Vue from "vue";
import Router from "vue-router";

import LinkList from "../components/LinkList";

const config = {
  shaarliUrl: "https://example.com/shaarli/",
  defaultSort: "title",
  shaarliScriptUrl: "/static/shaarli.php"
};

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
