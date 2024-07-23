/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router';

import * as globalMethods from './globalMethods'; // Import all global methods


const app = createApp(App);

Object.keys(globalMethods).forEach(methodName => {
    app.config.globalProperties[`$${methodName}`] = globalMethods[methodName];
});

app.component('app', App);

app.use(router).mount('#app');
