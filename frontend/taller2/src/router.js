import { createRouter, createWebHistory } from 'vue-router';
import HomeView from '@/components/views/HomeView.vue'; 
import LoginView from '@/components/views/LoginView.vue';

const routes = [
  {
    path: '/',
    name: 'Home',
    component: HomeView,
  },
  {
    path: '/login',
    name: 'Login',
    component: LoginView,
  },
  // Agrega más rutas según sea necesario
];

const router = createRouter({
  history: createWebHistory(),
  routes,
});

export default router;
