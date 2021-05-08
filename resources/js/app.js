require('./bootstrap');

window.Vue = require('vue').default;
import VueProgressBar from 'vue-progressbar';
import Snotify, { SnotifyPosition } from 'vue-snotify';
import { Form, HasError, AlertError } from 'vform';
import vSelect from 'vue-select'

import MultilevelAccordion from "vue-multilevel-accordion";

window.Form = Form;
const snotifyOptions = {
    toast: {
        position: SnotifyPosition.rightTop
    }
}

Vue.use(Snotify, snotifyOptions)

const options = {
    color: 'green',
    failedColor: '#874b4b',
    thickness: '5px',
    transition: {
        speed: '0.2s',
        opacity: '0.6s',
        termination: 300
    },
    autoRevert: true,
    location: 'top',
    inverse: false
}

Vue.use(VueProgressBar, options)

// core component
Vue.component('pagination-component', require('./components/core/Pagenation').default);
Vue.component('pagination-component', require('./components/core/Pagination').default);
Vue.component('dropdown-component', require('./components/core/Dropdown').default);


// Account module
Vue.component('account-list', require('./components/accounts/Lists').default);
Vue.component('account-details', require('./components/accounts/Account-details').default);
Vue.component('transaction-list', require('./components/transaction/Lists').default);
Vue.component('account-report', require('./components/reports/AccountReport').default);

Vue.component(HasError.name, HasError);
Vue.component(AlertError.name, AlertError);

// Select 2
Vue.component("v-select", vSelect);

// Vue moment
Vue.use(require('vue-moment'));

const app = new Vue({
    el: '#app',
});
