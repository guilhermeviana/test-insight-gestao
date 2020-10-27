require('./bootstrap');

window.Vue = require('vue');

import "bootstrap/dist/css/bootstrap.min.css"
import App from '../components/App'

const app = new Vue({
    el: '#app',
    render: h => h(App)
});
