// require('./bootstrap');
import axios from 'axios'
import Pagination from 'vuejs-paginate'

axios.defaults.baseURL = 'http://localhost:8000/api';

window.Vue = require('vue');

Vue.component('index-costumers', require('./components/IndexCostumers').default);
Vue.component('pagination', Pagination);

if (document.getElementById("wrapper")) {
    new Vue({
        el: '#wrapper',
    });
}