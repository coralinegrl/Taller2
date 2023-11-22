<template>
  <div>
    <!-- Botón para abrir el formulario de creación -->
    <button @click="createUser">Crear Usuario</button>

    <!-- Filtro de búsqueda -->
    <input v-model="searchTerm" placeholder="Buscar por RUT/DNI o correo electrónico" />
    <button @click="searchUsers">Buscar</button>

    <!-- Lista de usuarios -->
    <UserList
      :users="filteredUsers"
      @editUser="editUser"
      @deleteUser="deleteUser"
    />

    <!-- Formulario de edición -->
    <UserForm
      v-if="editingUser"
      :user="editingUser"
      :editing="true"
      @saveUser="saveUser"
    />
  </div>
</template>

<script>
import axios from 'axios';
import UserList from '@/components/UserList.vue';

export default {
  data() {
    return {
      users: [], // Almacena los usuarios obtenidos de la API
      editingUser: null, // Usuario que se está editando
      searchTerm: '', // Término de búsqueda
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
    createUser() {
      // Lógica para abrir el formulario de creación de usuario
      this.editingUser = { name: '', email: '' }; // Puedes inicializar con los campos necesarios
    },
    editUser(user) {
      // Lógica para editar un usuario
      this.editingUser = user;
    },
    saveUser(user) {
      // Lógica para guardar los cambios de edición o creación del usuario
      if (user.id) {
        // Es un usuario existente, realiza una solicitud PUT para actualizarlo
        axios.put(`/api/users/${user.id}`, user)
          .then(response => {
            // Actualiza la lista de usuarios o maneja la respuesta según tu necesidad
            this.fetchUsers();
            this.editingUser = null;
          })
          .catch(error => {
            console.error('Error al actualizar usuario:', error);
          });
      } else {
        // Es un nuevo usuario, realiza una solicitud POST para crearlo
        axios.post('/api/users', user)
          .then(response => {
            // Actualiza la lista de usuarios o maneja la respuesta según tu necesidad
            this.fetchUsers();
            this.editingUser = null;
          })
          .catch(error => {
            console.error('Error al crear usuario:', error);
          });
      }
    },
    deleteUser(user) {
      // Lógica para eliminar un usuario
      const confirmDelete = confirm('¿Estás seguro de eliminar este usuario?');
      if (confirmDelete) {
        axios.delete(`/api/users/${user.id}`)
          .then(response => {
            // Actualiza la lista de usuarios o maneja la respuesta según tu necesidad
            this.fetchUsers();
          })
          .catch(error => {
            console.error('Error al eliminar usuario:', error);
          });
      }
    },
    searchUsers() {
      // Lógica para buscar usuarios
      this.fetchUsers(); // Realiza la búsqueda de acuerdo a tus necesidades
    },
    fetchUsers() {
      // Lógica para obtener la lista de usuarios desde la API
      axios.get('/api/users')
        .then(response => {
          this.users = response.data;
        })
        .catch(error => {
          console.error('Error al obtener usuarios:', error);
        });
    }
  },
  created() {
    // Cuando se carga la vista, obtén la lista de usuarios
    this.fetchUsers();
  }
};
</script>
