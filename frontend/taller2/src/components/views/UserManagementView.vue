
<template>
  <div>
    <UserTable :users="users" @editUser="editUser" @deleteUser="deleteUser" />
    <UserForm v-if="showForm" @saveUser="saveUser" @cancel="cancelForm" />
    <ConfirmationModal v-if="showConfirmation" @confirm="confirmDelete" @cancel="cancelDelete" />
    <UserSearch @search="searchUsers" />
  </div>
</template>

<script>
import UserTable from "@/components/UserTable.vue";
import UserForm from "@/components/UserForm.vue";
import ConfirmationModal from "@/components/ConfirmationModal.vue";
import UserSearch from "@/components/UserSearch.vue";

export default {
  name: "UserManagementView",
  components: {
    UserTable,
    UserForm,
    ConfirmationModal,
    UserSearch,
  },
  data() {
    return {
      users: [],
      showForm: false,
      showConfirmation: false,
      selectedUser: null,
    };
  },
  methods: {
    // Método para editar un usuario
    editUser(user) {
      this.selectedUser = user;
      this.showForm = true;
    },
    // Método para eliminar un usuario
    deleteUser(user) {
      this.selectedUser = user;
      this.showConfirmation = true;
    },
    // Método para confirmar la eliminación de un usuario
    confirmDelete() {
      // Lógica para eliminar el usuario de la lista
      this.users = this.users.filter((user) => user.id !== this.selectedUser.id);
      this.selectedUser = null;
      this.showConfirmation = false;
    },
    // Método para cancelar la eliminación de un usuario
    cancelDelete() {
      this.selectedUser = null;
      this.showConfirmation = false;
    },
    // Método para guardar un usuario
    saveUser(user) {
      // Lógica para guardar el usuario en la lista
      if (user.id) {
        // Editar usuario existente
        const index = this.users.findIndex((u) => u.id === user.id);
        this.users.splice(index, 1, user);
      } else {
        // Crear nuevo usuario
        user.id = this.users.length + 1;
        this.users.push(user);
      }
      this.selectedUser = null;
      this.showForm = false;
    },
    // Método para cancelar el formulario de usuario
    cancelForm() {
      this.selectedUser = null;
      this.showForm = false;
    },
    // Método para buscar usuarios
    searchUsers(query) {
      // Lógica para buscar usuarios en la lista
      // Filtrar la lista de usuarios según el criterio de búsqueda
      this.users = this.users.filter((user) => {
        return (
          user.name.toLowerCase().includes(query.toLowerCase()) ||
          user.email.toLowerCase().includes(query.toLowerCase())
        );
      });
    },
  },
  created() {
    // Lógica para obtener la lista de usuarios desde el backend
    // y asignarla a la propiedad "users"
    // Ejemplo:
    // this.users = axios.get("/api/users");
  },
};
</script>
