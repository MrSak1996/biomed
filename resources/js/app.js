require('./bootstrap');



import { createApp } from 'vue';
import App from './App.vue';
// import store from './store';
import router from './router';


const app = createApp(App);



// Mount the app with router, store, and other configurations
app.use(router)
//    .use(store)
   .mount('#app');
   

