<template>
  <div>
    <!-- Botón o enlace para abrir el modal -->
    <button @click="openModal">Abrir modal</button>

    <!-- Modal -->
    <div v-if="isModalOpen">
      <div class="modal-content">
        <!-- Componente UserForm.vue -->
        <UserForm :user="user" />

        <!-- Botón o enlace para cerrar el modal -->
        <button @click="closeModal">Cerrar modal</button>
      </div>
    </div>
  </div>
</template>

<script>
import UserForm from "@/components/UserForm.vue";

export default {
  components: {
    UserForm,
  },
  data() {
    return {
      isModalOpen: false,
      user: null,
    };
  },
  methods: {
    openModal() {
      // Asignar los datos del usuario a la propiedad user
      this.user = {
        // Datos del usuario
      };

      // Abrir el modal
      this.isModalOpen = true;
    },
    closeModal() {
      // Reiniciar la propiedad user
      this.user = null;

      // Cerrar el modal
      this.isModalOpen = false;
    },
  },
};
</script>
