require('./bootstrap');

import router from './routes';
import VueRouter from 'vue-router';
import Vue from 'vue';
import Index from './Index';
import moment from 'moment';

import StarRating from './shared/components/StarRating';

window.Vue = require('vue').default;
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// Vue.component('example-2', require('./components/ExampleComponent2.vue').default);

Vue.use(VueRouter);
Vue.filter('fromNow', value => {
    return moment(value).fromNow();
})

Vue.component('star-rating', StarRating);

const app = new Vue({
    el: '#app',
    router,
    components: {
        "index": Index
    }
});
