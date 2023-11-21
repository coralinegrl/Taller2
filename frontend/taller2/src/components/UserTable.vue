<template>
  <div>
    <table>
      <thead>
        <tr>
          <th>Nombre</th>
          <th>Correo electrónico</th>
          <th>Acciones</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="user in filteredUsers" :key="user.id">
          <td>{{ user.name }}</td>
          <td>{{ user.email }}</td>
          <td>
            <button @click="editUser(user)">Editar</button>
            <ConfirmationModal @confirm="deleteUser(user)">Eliminar</ConfirmationModal>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import ConfirmationModal from "@/components/modals/ConfirmationModal.vue"; 

export default {
  components: {
    ConfirmationModal // Registra el componente modal de confirmación
  },
  data() {
    return {
      users: [
        { id: 1, name: 'Usuario 1', email: 'usuario1@example.com', role: 'admin' },
        { id: 2, name: 'Usuario 2', email: 'usuario2@example.com', role: 'user' },
        { id: 3, name: 'Usuario 3', email: 'usuario3@example.com', role: 'user' },
        // Agrega más usuarios aquí si es necesario
      ],
    };
  },
  computed: {
    filteredUsers() {
      return this.users.filter(user => user.role !== 'admin');
    }
  },
  methods: {
    editUser(user) {
      // Lógica para editar el usuario seleccionado
      // Puedes abrir un modal de edición o navegar a una página de edición
      // Por ejemplo: this.$router.push(`/edit-user/${user.id}`);
    },
    deleteUser(user) {
      // Lógica para eliminar el usuario seleccionado
      // Elimina el usuario de la lista (this.users)
      const index = this.users.findIndex(u => u.id === user.id);
      if (index !== -1) {
        this.users.splice(index, 1);
      }
    }
  }
};
</script>


