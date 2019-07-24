
require('./bootstrap');

window.Vue = require('vue');
window.select2 = require('select2');
window.moment = require('moment');
window.events = new Vue();
window.flash = function (message, level = 'info') {
    window.events.$emit('flash', { message, level });
};

// select2 vue
import _ from 'lodash';
import Select2 from './components/Select2.vue';
Vue.component('select2', Select2);

// controllers
require('./controllers/clientLabelsticker');
