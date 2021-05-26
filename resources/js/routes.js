import VueRouter from 'vue-router';
import Bookables from './bookables/Bookables.vue';
import Example2 from './components/ExampleComponent2.vue';

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home"
    },
    {
        path: "/second",
        component: Example2,
        name: "second"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
})

export default router;
