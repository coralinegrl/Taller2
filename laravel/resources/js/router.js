import { createRouter, createWebHistory } from 'vue-router';
import HomeView from './components/views/HomeView.vue';
import LoginView from './components/views/LoginView.vue';
import UserManagementView from './components/views/UserManagementView.vue';

const router = createRouter({
  history: createWebHistory(),
  routes: [
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
    {
      path: '/user-management',
      name: 'UserManagement',
      component: UserManagementView,
    },
    // Agrega más rutas según sea necesario
  ],
});

export default router;

