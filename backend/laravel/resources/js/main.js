import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Si estás utilizando Vue Router


const app = createApp(App);

app.use(router); // Si estás utilizando Vue Router

createApp(App).mount('#app');