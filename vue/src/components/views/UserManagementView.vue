<template>
  <div class="flex flex-col p-6">

    <!-- Esquina superior izquierda: Botón para abrir el formulario de creación -->
    <div class="flex justify-between mb-4">
      <button
        @click="showCreateUserModal"
        class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600 focus:outline-none transition ease-in duration-200"
      >
        Crear Usuario
      </button>

      <!-- Esquina superior derecha: Filtro de búsqueda -->
      <div class="flex items-center">
        <input
          v-model="searchTerm"
          placeholder="Buscar por rut o correo"
          class="rounded-l px-4 py-2"
          style="border: 1px solid #D1D5DB;" 
        />
        <button
          @click="searchUsers"
          class="bg-green-500 text-white px-4 py-2 rounded-r hover:bg-green-600 focus:outline-none transition ease-in duration-200"
        >
          Buscar
        </button>
      </div>
    </div>

    <!-- Lista de usuarios -->
    <UserList
      :users="filteredUsers"
      @editUser="editUser"
      @deleteUser="deleteUser"
    /> 

    <!-- Modal para crear usuario -->
    <CreateUserModal
      v-if="isCreateUserModalVisible"
      @close="isCreateUserModalVisible = false"
    />

  </div>
</template>

<script>
import UserList from '../UserList.vue';
import CreateUserModal from '../modals/CreateUserModal.vue';

export default {
  components: {
    UserList,
    CreateUserModal
  },
  data() {
    return {
      users: [], // Lista de usuarios a mostrar
      searchTerm: '',
      isCreateUserModalVisible: false,
    };
    
  },
};
</script>
