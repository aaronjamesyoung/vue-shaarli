import Vue from 'vue';
import Router from 'vue-router';

import ComponentA from '../components/ComponentA';

Vue.use(Router);

export default new Router({
  routes: [
    {
      path: '/',
      component: ComponentA,
    },
  ],
});
