<template>
  <div class="flex flex-col justify-center items-start h-screen p-10 space-y-4">
    <!-- Asume que tus botones y el input de búsqueda ya están aquí -->
    
    <!-- Tabla -->
    <div class="w-full max-w-4xl">
      <table class="w-full text-left border-collapse border border-green-300">
        <thead>
          <tr class="text-sm font-medium text-center text-gray-700 ">
            <th class="px-4 py-3 border border-green-300">RUT/DNI</th>
            <th class="px-4 py-3 border border-green-300">Correo electrónico</th>
            <th class="px-4 py-3 border border-green-300">Acciones</th>
          </tr>
        </thead>
        <tbody>
          <template v-if="users && users.length">
            <tr v-for="user in users" :key="user.id" class="hover:bg-green-50">
              <td class="px-4 py-3 border border-green-300">{{ user.rut }}</td>
              <td class="px-4 py-3 border border-green-300">{{ user.email }}</td>
              <td class="px-4 py-3 border border-green-300">
                <button @click="editUser(user)" class="text-sm bg-green-500 hover:bg-green-600 text-white font-bold py-1 px-2 rounded transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-300 focus:ring-opacity-50">
                  Editar
                </button>
                <button @click="deleteUser(user)" class="text-sm bg-red-500 hover:bg-red-600 text-white font-bold py-1 px-2 rounded transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-red-300 focus:ring-opacity-50">
                  Eliminar
                </button>
              </td>
            </tr>
          </template>
          <tr v-if="!users || users.length === 0">
            <td colspan="3" class="text-center py-3 border border-green-300">No hay usuarios para mostrar</td>
          </tr>
        </tbody>
      </table>
    </div>
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
