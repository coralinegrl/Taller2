<template>
  <div>
    <input v-model="searchTerm" placeholder="Buscar por RUT/DNI o correo electrónico" />
    <button @click="searchUsers">Buscar</button>
    <table>
      <thead>
        <tr>
          <th>RUT/DNI</th>
          <th>Correo electrónico</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in filteredUsers" :key="user.id">
          <td>{{ user.rut }}</td>
          <td>{{ user.email }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from 'axios'; // Importa Axios

export default {
  data() {
    return {
      searchTerm: '',
      users: [], // Almacena los usuarios obtenidos de la API
    };
  },
  computed: {
    filteredUsers() {
      const term = this.searchTerm.toLowerCase();
      return this.users.filter(user => {
        return user.rut.toLowerCase().includes(term) || user.email.toLowerCase().includes(term);
      });
    }
  },
  methods: {
    async searchUsers() {
      try {
        // Realiza una solicitud HTTP a la API para buscar usuarios
        const response = await axios.get(`/api/users?search=${this.searchTerm}`);
        // Actualiza this.users con los usuarios obtenidos de la API
        this.users = response.data;
      } catch (error) {
        console.error('Error al buscar usuarios:', error);
        // Maneja los errores de la búsqueda, por ejemplo, muestra un mensaje de error al usuario
        alert('Error al buscar usuarios. Por favor, inténtalo de nuevo.');
      }
    }
  }
};
</script>

