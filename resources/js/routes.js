import VueRouter from 'vue-router';
import Bookables from './bookables/Bookables';
import BookableView from './bookable/BookableView';

const routes = [
    {
        path: "/",
        component: Bookables,
        name: "home"
    },
    {
        path: "/bookable/:id",
        component: BookableView,
        name: "bookable"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
})

export default router;
