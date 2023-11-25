<template>
    <div class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full" @click.self="closeModal">
      <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3 text-center">
          <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-green-100">
            <svg class="h-6 w-6 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <!-- Icono de usuario o algo relevante -->
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          <h3 class="text-lg leading-6 font-medium text-gray-900">Crear Usuario</h3>
          <div class="mt-2 px-7 py-3">
            <input type="text" placeholder="Nombre" class="mb-3 px-4 py-2 border rounded w-full" />
            <input type="text" placeholder="Apellido" class="mb-3 px-4 py-2 border rounded w-full" />
            <input type="text" placeholder="Email" class="mb-3 px-4 py-2 border rounded w-full" />
            <input type="text" placeholder="Rut" class="mb-3 px-4 py-2 border rounded w-full" />
            <input type="text" placeholder="Puntos" class="mb-3 px-4 py-2 border rounded w-full" />
            <!-- Añade más campos según sea necesario -->
          </div>
          <div class="items-center px-4 py-3">
            <button
              @click="closeModal"
              class="px-4 py-2 bg-green-500 text-white text-base font-medium rounded-md w-full shadow-sm hover:bg-green-700 focus:outline-none focus:ring-2 focus:ring-green-300"
            >
              Crear Usuario
            </button>
          </div>
          <div class="items-center px-4 py-3">
            <button
              @click="closeModal"
              class="px-4 py-2 bg-white text-green-600 text-base font-medium rounded-md w-full shadow-sm border border-green-600 hover:bg-green-50 focus:outline-none focus:ring-2 focus:ring-green-300"
            >
              Cancelar
            </button>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  export default {
    methods: {
      closeModal() {
        this.$emit('close');
      }
    }
  };
  </script>
  
  <style>
  /* Si necesitas estilos adicionales, añádelos aquí */
  </style>
  