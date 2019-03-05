
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import { Form, HasError, AlertError } from 'vform';

window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

import VueRouter from 'vue-router';

Vue.use(VueRouter);

let routes = [
    { path: '/dashboard', component: require('./components/member/dashboard/DashboardComponent.vue').default },
    // { path: '/bible', component: Foo },
    { path: '/word-log', component: require('./components/member/wordlog/WordlogComponent.vue').default },
    // { path: '/voice-note', component: Foo },
    // { path: '/event-videos', component: Foo },
    // { path: '/news-bulletin', component: Foo },
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

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
});
