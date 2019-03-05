import VueRouter from 'vue-router';

Vue.use(VueRouter);

let routes = [
    { path: '/dashboard', component: require('./components/Dashbaord.vue') },
    // { path: '/bible', component: Foo },
    // { path: '/word-log', component: Foo },
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
    routes //short for 'routes: routes'
});