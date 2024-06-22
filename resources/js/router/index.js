import { createRouter, createWebHistory } from "vue-router";
import Login from "../components/login.vue";
import Dashboard from "../components/admin/dashboard.vue";
import HospitalList from "../components/admin/hospital_list.vue";

// CLIENT LIST
import ClientList from "../components/client/index.vue";
import PMSForm from "../components/client/form_pms.vue";
const routes = [

    {
        path:'/',
        name:'login',
        component: Login
    },
    {
        path:'/admin/dashboard',
        name: 'Dashboard',
        component: Dashboard
    },
    {
        path:'/admin/hospital_list',
        name: 'HospitalList',
        component: HospitalList
    },
    {
        path: '/client/index',
        name: 'ClientList',
        component: ClientList
    },
    {
        path: '/client/form_pms',
        name: 'PMSForm',
        component: PMSForm
    }
];

const router = createRouter({
    mode: 'history',
    history: createWebHistory(process.env.BASE_URL),
    routes,
    router: router
})
export default router