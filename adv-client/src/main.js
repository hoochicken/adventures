import Vue from 'vue'
import VueRouter from 'vue-router'
import 'bootstrap'
import 'bootstrap/dist/css/bootstrap.min.css'
import Index from './App.vue'
import HerosList from './components/heros/list.vue'
import HerosAdd from './components/heros/add.vue'
import axios from "./plugins/axios";

Vue.config.productionTip = false;
Vue.use(VueRouter, axios);
Vue.axios.defaults.baseURL = `http://${process.env.VUE_APP_ENV_HOST}:${process.env.VUE_APP_ENV_PORT}`;

const routes = [
  { path: '/heros/list', component: HerosList },
  { path: '/hero/add', component: HerosAdd },
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
