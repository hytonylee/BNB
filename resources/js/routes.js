import VueRouter from 'vue-router';
import Bookables from './bookables/Bookables';
import BookableView from './bookable/BookableView';
import Review from './review/Review';

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
    },
    {
        path: "/review/:id",
        component: Review,
        name: "review"
    }
];

const router = new VueRouter({
    routes,
    mode: "history"
})

export default router;
