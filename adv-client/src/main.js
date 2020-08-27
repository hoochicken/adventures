import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import Index from './App.vue'

import HeroList from './components/hero/list.vue'
import HeroCreate from './components/hero/create.vue'
import HeroUpdate from './components/hero/update.vue'

import PlaceList from './components/place/list.vue'
import PlaceCreate from './components/place/create.vue'
import PlaceUpdate from './components/place/update.vue'

import axios from "./plugins/axios";
import Pagination from 'vue-paginate-al'

Vue.config.productionTip = false;
Vue.use(VueRouter, axios);
Vue.axios.defaults.baseURL = `http://${process.env.VUE_APP_ENV_HOST}:${process.env.VUE_APP_ENV_PORT}`;
Vue.component('pagination', Pagination);

const routes = [
  { path: '/hero/list', component: HeroList },
  { path: '/hero/create', component: HeroCreate },
  { path: '/hero/update/:id', component: HeroUpdate },
  { path: '/place/list', component: PlaceList },
  { path: '/place/create', component: PlaceCreate },
  { path: '/place/update/:id', component: PlaceUpdate },
  { path: '/', component: Index }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

new Vue({
  router,
  render: h => h(Index)
}).$mount('#app');
