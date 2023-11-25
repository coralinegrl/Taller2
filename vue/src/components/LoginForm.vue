<template>
    <div>
      <div class="max-w-md w-full p-4 bg-white shadow-lg rounded-lg">
        <h1 class="text-2xl font-semibold mb-4">Iniciar sesión</h1>
        <form method="post" @submit.prevent="login">
          <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> 
          <div class="mb-4">
            <label for="username" class="block text-gray-600">Nombre de usuario:</label>
            <input id="username" v-model="username" type="text" class="w-full border rounded px-3 py-2" required>
          </div>
          <div class="mb-6"> <!-- Cambia mb-4 a mb-6 para agregar más separación -->
            <label for="password" class="block text-gray-600">Contraseña:</label>
            <input type="password" id="password" v-model="password" class="w-full border rounded px-3 py-2" required>
          </div>
          <button @click="login" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Iniciar sesión</button>
        </form>
      </div>
    </div>
</template>
  
<script>
import axios from 'axios'; // Importa Axios
  
export default {
    data() {
      return {
        username: '',
        password: '',
      }
    },
    methods: {
      async login() {
        const apiUrl = 'http://127.0.0.1:8000/api/login';
        console.log(this.username, this.password);
        try{
          const response = await axios.post(apiUrl, {
            username: this.username,
            password: this.password,
          });
          if (response.data.is_admin) {
             this.$router.push({ name: 'UserManagement' }); // Redirige al usuario a la página de administración
          } else {
             this.$router.push({ name: 'Home' }); // Redirige al usuario a la página principal
          }
        } catch (error){
          console.log(error.response.data);
        }
      },
    },
  };

  </script>
  
  <style>
  /* Agrega tus estilos personalizados aquí */
  </style>
  
  
