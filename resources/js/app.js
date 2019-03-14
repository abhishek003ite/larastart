
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//vForm Code
import { Form, HasError, AlertError } from 'vform';
//momentjs Import
import moment from 'moment';
//Vue Progress Bar Import
import VueProgressBar from 'vue-progressbar'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import swal from 'sweetalert2';
window.swal = swal;

const Toast = swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000
  });

  window.toast = Toast;

import VueRouter from 'vue-router';

Vue.use(VueRouter);

Vue.use(VueProgressBar, {
    color: 'rgb(143, 255, 199)',
    failedColor: 'red',
    height: '2px'
});

let routes = [
    { path: '/dashboard', component: require('./components/admin/dashboard/DashboardComponent.vue').default },
    { path: '/word-log', component: require('./components/admin/wordlog/WordlogComponent.vue').default },
    { path: '/voice-note', component: require('./components/admin/audioNote/AudioComponent.vue').default },
    { path: '/event-videos', component: require('./components/admin/eventVideos/EventVideoComponent.vue').default },
    // { path: '/news-bulletin', component: require('./components/admin/newsBulletin/NewsBulletinComponent.vue').default },
    // { path: '/testimony', component: Foo },
    // { path: '/prayer-request', component: Foo },
    // { path: '/keeper-network', component: Foo },
    // { path: '/mempacas/view-group', component: Foo },
    // { path: '/children-register/add-child', component: Foo },
    // { path: '/children-register/view-class', component: Foo },
    // { path: '/children-register/mark-attendance', component: Foo },
    // { path: '/children-register/report-incident', component: Foo },
    // { path: '/donate', component: Foo },
    // { path: '/book-store/book-store', component: Foo },
    // { path: '/book-store/my-books', component: Foo },
    // { path: '/search', component: Foo },
];

const router = new VueRouter({
    routes, //short for 'routes: routes',
    hashbang: false
});

Vue.filter('upText', function(text) {
    return text.charAt(0).toUpperCase() + text.slice(1);
});

Vue.filter('myDate', function(dateCreated) {
    return moment(dateCreated).format('Do MMMM YYYY');
});

window.Fire = new Vue();

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    el: '#app',
    router,
});
