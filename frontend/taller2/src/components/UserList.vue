<template>
    <div class="flex justify-center items-center h-screen">
      <table class="border-collapse w-2/3">
        <thead>
          <tr>
            <th class="p-2 border">RUT/DNI</th>
            <th class="p-2 border">Correo electrónico</th>
            <th class="p-2 border">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="user in users" :key="user.id">
            <td class="p-2 border">{{ user.rut }}</td>
            <td class="p-2 border">{{ user.email }}</td>
            <td class="p-2 border">
              <button @click="editUser(user)" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-2 rounded mr-2">
                Editar
              </button>
              <button @click="deleteUser(user)" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 rounded">
                Eliminar
              </button>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </template>
  
<script>
export default {
    props: {
      users: Array, // Lista de usuarios a mostrar
    },
    methods: {
      editUser(user) {
        // Emitir el evento para editar un usuario
        this.$emit('editUser', user);
      },
      deleteUser(user) {
        // Emitir el evento para eliminar un usuario
        this.$emit('deleteUser', user);
      },
    },
  };
</script>
  