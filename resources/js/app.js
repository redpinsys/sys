
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

import Select2MustChoose from './components/Select2MustChoose.vue';
Vue.component('select2-must', Select2MustChoose);

// flash vue
import Flash from './components/Flash.vue';
Vue.component('flash', Flash);

// vue pagination component
import Pagination from './components/Pagination.vue';
Vue.component('pagination', Pagination);

// vue js loading
import PulseLoader from 'vue-spinner/src/PulseLoader.vue';
Vue.component('pulse-loader', PulseLoader);

import ClipLoader from 'vue-spinner/src/ClipLoader.vue';
Vue.component('clip-loader', ClipLoader);

// vue multiselect
import Multiselect from 'vue-multiselect';
Vue.component('multiselect', Multiselect);

// controllers
require('./controllers/clientLabelsticker');
require('./controllers/clientInkjetsticker');
require('./controllers/indexOrderController');
require('./controllers/indexPriceController');
