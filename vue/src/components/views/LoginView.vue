<!-- LoginView.vue -->
<template>
  <div class="min-h-screen flex items-center justify-center">
    <img src="/assets/dumbologo.png" alt="Dumbo Logo" class="w-32 h-32 mb-4 mr-6" />
      <!-- Aquí puedes agregar los campos de inicio de sesión (por ejemplo, nombre de usuario y contraseña) -->
      <LoginForm />
    
  </div>
</template>

<script>
import LoginForm from '../LoginForm.vue' 


export default {
  components: {
    LoginForm // Asegúrate de importar y registrar el componente LoginForm
  }
}
</script>

<style>
/* Estilos para la vista de inicio de sesión (si es necesario) */
</style>
