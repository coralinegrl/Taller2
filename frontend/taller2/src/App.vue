<template>
  <div id="app">
    <!-- Aquí puedes agregar contenido común a todas las vistas, como encabezados o barras de navegación -->
    <router-view></router-view> <!-- Este componente se actualizará según la ruta actual -->
  </div>
</template>


<script>
import { ref } from 'vue';
export default {
  name: 'App',
};
</script>

<style>
/* Agrega estilos globales aquí si es necesario */
</style>
