import 'tailwindcss/tailwind.css';
import { createApp } from 'vue';
import App from './App.vue'; // Asegúrate de que la ruta al archivo App.vue sea correcta
import router from './router'; // Asegúrate de que la ruta al archivo router.js sea correcta

const app = createApp(App);


app.use(router);

app.mount('#app');
