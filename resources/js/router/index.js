import { createRouter, createWebHistory } from 'vue-router';
import Dashboard from '../components/admin/dashboard.vue';

const routes = [
  {
    path: '/',
    name: 'Dashboard',
    component: Dashboard,
  },
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
