import 'tailwindcss/tailwind.css';
import { createApp } from 'vue';
import App from './App.vue';
import router from './router'; // Asegúrate de que este importe el router que declaraste en otro archivo

createApp(App).use(router).mount('#app');
