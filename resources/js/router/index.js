import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../components/admin/dashboard.vue';
import JobOrderForm from '../components/technician/joborder.vue';
import JobOrderFormCreate from '../components/technician/joborder_create.vue';
import JobOrderFormView from '../components/technician/joborder_view.vue';
import Task_sched from '../components/technician/task_sched.vue';
import Task_management from '../components/technician/task_management.vue';
import PMSForm from "../components/technician/pms.vue";
import PMSCreate from "../components/technician/pms_create.vue";
import ServiceReport from "../components/technician/service-report.vue";
import ServiceReportCreate from "../components/technician/service-report-create.vue";
import SummaryReport from "../components/technician/summary-report.vue";
import ServiceQuotation from "../components/technician/service-quotation.vue";
import ServiceQuotationCreate from "../components/technician/service-quotation-create.vue";

import LoginView from "../components/Login.vue";
import ClientDashboardView from "../components/client/dashboard.vue";
import ClientInventoryCreate from "../components/client/inventory/index.vue";
const routes = [
  {
    path: '/',
    name:'Login',
    component: LoginView
  },
  // HOSPITAL ACCOUNT
  {
    path: '/client-dashboard',
    name:'Client Dashboard',
    component: ClientDashboardView
  },
  {
    path: '/inventory-management',
    name:'Inventory Management',
    component: ClientInventoryCreate
  },





  {
    path: '/dashboard',
    name: 'Dashboard',
    component: Dashboard,
  },
  {
    path: '/job-order',
    name: 'Job Order',
    component: JobOrderForm
  },
  {
    path: '/job-order-create',
    name: 'Job Order Create',
    component: JobOrderFormCreate
  },
  {
    path: '/job-order-view/:id',
    name: 'Job Order View',
    component: JobOrderFormView
  },
  {
    path: '/task-sched',
    name: 'Task Schedule',
    component: Task_sched
  },
  {
    path: '/task-management',
    name: 'Task Management',
    component: Task_management
  },
  {
    path: '/inventory',
    name: 'Inventory',
    component: Task_sched
  },
  {
    path: '/pms',
    name: 'Preventive Maintenance Service',
    component: PMSForm
  },
  {
    path: '/pms-create',
    name: 'Preventive Maintenance Service Create',
    component: PMSCreate
  },
  {
    path: '/service-report',
    name: 'Service Report',
    component: ServiceReport
  },
  {
    path: '/service-report-create',
    name: 'Service Report Create',
    component: ServiceReportCreate
  },
  {
    path: '/summary-report',
    name: 'Summary Report',
    component: SummaryReport
  },
  {
    path: '/service-quotation',
    name: 'Service Quotation',
    component:ServiceQuotation
  },
  {
    path: '/service-quotation-create',
    name: 'Service Quotation Create',
    component:ServiceQuotationCreate
  }

];

const router = createRouter({
  history: createWebHistory(import.meta.env.PROD),

  routes,
});

// Uncomment and adjust the navigation guard as needed
// router.beforeEach((to, from, next) => {
//   const token = localStorage.getItem('api_token');

//   // Check if the route requires authentication
//   if (to.matched.some(record => record.meta.requiresAuth)) {
//     // If the route requires authentication, check if the token is present
//     if (!token) {
//       // If token is not present, redirect to the sign-in page
//       next({ name: 'Login' });
//     } else {
//       // If token is present, validate the token with the backend
//       axios.get('/api/authenticated', {
//         headers: {
//           Authorization: `Bearer ${token}`,
//         },
//       })
//       .then(response => {
//         if (response.data.authenticated) {
//           // If token is valid, proceed with the navigation
//           next();
//         } else {
//           // If token is invalid, redirect to the sign-in page
//           next({ name: 'Login' });
//         }
//       })
//       .catch(() => {
//         // If an error occurs during token validation, redirect to the sign-in page
//         next({ name: 'Login' });
//       });
//     }
//   } else {
//     // If the route does not require authentication, proceed with the navigation
//     next();
//   }
// });

export default router;
