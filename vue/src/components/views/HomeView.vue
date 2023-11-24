<template>
    <div class="text-center mt-10">
      <img
        src="/assets/dumbologo.png"
        alt="Dumbo Logo"
        class="mx-auto"
        style="max-width: 200px;" 
      />
      <h1 class="text-3xl mt-4">Bienvenido a Dumbo Supermercados Ltda.</h1>
      <router-link to="/login" class="bg-green-500 text-white px-4 py-2 rounded mt-4 inline-block">Iniciar Sesión</router-link>
    </div>
</template>
  
<script>
export default {
    name: 'HomeView',

    // Otras opciones del componente
}
</script>
  
<style>
  
  /* Estilos adicionales para este componente, si es necesario */
</style>
  