require('./bootstrap');

window.Vue = require('vue');

import "bootstrap/dist/css/bootstrap.min.css"
import Home from '../components/Home'
import Routes from '../js/routes.js';

const app = new Vue({
    el: '#app',
    router: Routes,
    render: h => h(Home)
});
