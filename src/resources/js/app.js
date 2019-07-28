import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
import { RestaurantList } from './components';

Vue.use(BootstrapVue);

Vue.component('restaurant-list', RestaurantList);

const app = new Vue({
    el: '#app',
});
