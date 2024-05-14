import { createRouter, createWebHistory } from "vue-router";
import ExampleComponent from "../components/ExampleComponent.vue";
import Login from "../components/login.vue";
const routes = [
    {
        path: '/',
        name: 'example',
        component: ExampleComponent,
    },
    {
        path:'/login',
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