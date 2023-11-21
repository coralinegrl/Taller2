<template>
  <div class="modal">
    <h2>Confirmación de eliminación de usuario</h2>
    <p>¿Estás seguro de que deseas eliminar este usuario?</p>
    <div>
      <button @click="confirmDelete">Confirmar</button>
      <button @click="cancelDelete">Cancelar</button>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    confirmDelete() {
      this.$emit('deleteConfirmed');
    },
    cancelDelete() {
      this.$emit('deleteCancelled');
    }
  }
}
</script>

<style scoped>
.modal {
  /* Estilos para el modal */
}
</style>
