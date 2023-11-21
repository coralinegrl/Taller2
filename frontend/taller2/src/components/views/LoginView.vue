<template>
  <div class="min-h-screen flex items-center justify-center">
    <img src="@/assets/dumbologo.png" alt="Dumbo Logo" class="w-32 h-32 mb-4 mr-6" />
    <div class="max-w-md w-full p-4 bg-white shadow-lg rounded-lg">
      <h1 class="text-2xl font-semibold mb-4">Iniciar sesión</h1>
      <!-- Aquí puedes agregar los campos de inicio de sesión (por ejemplo, nombre de usuario y contraseña) -->
      <form>
        <!-- Campos de inicio de sesión -->
        <div class="mb-4">
          <label for="username" class="block text-gray-600">Nombre de usuario:</label>
          <input type="text" id="username" class="w-full border rounded px-3 py-2" />
        </div>
        <div class="mb-4">
          <label for="password" class="block text-gray-600">Contraseña:</label>
          <input type="password" id="password" class="w-full border rounded px-3 py-2" />
        </div>
        <!-- Botón de inicio de sesión -->
        <button @click="login" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">Iniciar sesión</button>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    login() {
    
      // Lógica para iniciar sesión
    }
  }
}
</script>

<style>
/* Estilos para la vista de inicio de sesión (si es necesario) */
</style>
