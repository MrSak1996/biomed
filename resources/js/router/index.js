import { createRouter, createWebHistory } from "vue-router";
import Login from "../components/login.vue";
const routes = [

    {
        path:'/',
        name:'login',
        component: Login
    }
];

const router = createRouter({
    mode: 'history',
    history: createWebHistory(process.env.BASE_URL),
    routes,
    router: router
})
export default router