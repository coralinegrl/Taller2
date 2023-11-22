import { createApp } from 'vue';
import Vue from 'vue';
import App from './App.vue';
import router from './router'; // Ruta relativa a main.js
import 'tailwindcss/tailwind.css'


const app = createApp(App);
app.use(router);
app.mount('#app');