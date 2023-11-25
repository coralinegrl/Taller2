<template>  
    <table class="min-w-full">
      <thead>
        <tr>
          <th class="px-4 py-2 border">Nombre</th>
          <th class="px-4 py-2 border">Apellido</th>
          <th class="px-4 py-2 border">Rut</th>
          <th class="px-4 py-2 border">Correo</th>
          <th class="px-4 py-2 border">Puntos</th>
        </tr>
      </thead>
      <tbody>
        <!-- Loop through your users array -->
        <tr v-for="(user, index) in localusersList" :key="index" class="border">
          <td class="px-4 py-2 border">
            <div v-if="!user.isEditing">{{ user.name }}</div>
            <input v-else v-model="user.name" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </td>
          <td class="px-4 py-2 border">
            <div v-if="!user.isEditing">{{ user.surname }}</div>
            <input v-else v-model="user.surname" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </td>
          <td class="px-4 py-2 border">
            <div v-if="!user.isEditing">{{ user.rut }}</div>
            <input v-else v-model="user.year" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </td>
          <td class="px-4 py-2 border">
            <div v-if="!user.isEditing">{{ user.email }}</div>
            <input v-else v-model="user.email" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </td>
          <td class="px-4 py-2 border">
            <div v-if="!user.isEditing">{{ user.points }}</div>
            <input v-else v-model="user.points" type="text" class="w-full px-3 py-2 border border-gray-300 rounded-md">
          </td>
          <td class="px-4 py-2 border">
            <span v-if="!user.isEditing" @click="editUser(user)" class="cursor-pointer text-blue-500 hover:text-blue-700">
              <PencilIcon class="w-4 h-4 inline" />
            </span>
            <span v-else>
              <button @click="updateuser(user)" class="bg-green-500 text-white px-3 py-1 rounded-md">Guardar</button>
              <button @click="cancelEdit(user)" class="bg-red-500 text-white px-3 py-1 rounded-md">Cancelar</button>
            </span>
          </td>
        </tr>
      </tbody>
    </table>
</template>

<script>
import { PencilIcon } from '@heroicons/vue/solid';
import axios from 'axios';

export default {
  data() {
    return {
      users: [], // Lista de usuarios a mostrar
      searchTerm: '',
    };
  },
  mounted() {
    this.fetchUsers();
  },
  
  computed: {
    localUsersList() {
      // Agrega una propiedad isEditing a cada usuario para controlar la edición
      return this.users.map(user => ({ ...user, isEditing: false }));
    },
    filteredUsers() {
      // Filtrar usuarios por RUT
      return this.localUsersList.filter(user => user.rut.includes(this.filter));
    },
  },
  methods: {
    fetchUsers() {
      const token = localStorage.getItem('token');
      axios.get('http://127.0.0.1:8000/api/users', {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      .then(response => {
        this.users = response.data; // Guarda los usuarios en la propiedad users
      })
      .catch(error => {
        console.error('There was an error fetching the users:', error);
      });
    },
    editUser(user) {
      user.isEditing = true; // Establecer el modo de edición para este usuario
    },
    updateUser(user) {
      const token = localStorage.getItem('token');
      axios.patch(`http://127.0.0.1:8000/api/users/${user.id}`, {
        name: user.name,
        surname: user.surname,
        rut: user.rut, 
        email: user.email,
        points: user.points,
      }, {
        headers: {
          Authorization: `Bearer ${token}`,
          'Content-Type': 'application/json',
        }
      })
      .then(response => {
        console.log('Usuario actualizado:', response.data);
        user.isEditing = false; 
        this.fetchUsers(); 
      })
      .catch(error => {
        console.error('Hubo un error al actualizar el usuario:', error);
        
      });
    },
    cancelEdit(user) {
      user.isEditing = false; // Desactivar el modo de edición sin guardar los cambios
      
    },
    searchUsers(user) {
      const token = localStorage.getItem('token');
      axios.get(`http://127.0.0.1:8000/api/users`, {
        headers: {
          Authorization: `Bearer ${token}`
        }
      })
      this.filteredUsers = this.users.filter(user => {
        return (
          user.rut.includes(this.searchTerm) ||
          user.email.includes(this.searchTerm)

        );
      });
    },
  },
}
</script>
        

        
