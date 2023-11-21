<template>
    <div>
        <h2>{{ editing ? 'Editar Usuario' : 'Crear Usuario' }}</h2>
        <form @submit.prevent="saveUser">
            <label for="name">Nombre:</label>
            <input id="name" type="text" required :value="user.name" @input="user.name = $event" />
            <label for="email">Correo Electrónico:</label>
            <input id="email" type="email" required v-model="user.email" />
            <!-- Otros campos de usuario -->
            <button type="submit">{{ editing ? 'Guardar' : 'Crear' }}</button>
        </form>
    </div>
</template>
  
<script>
export default {
    props: {
        user: Object, // Objeto de usuario para edición o creación
        editing: Boolean, // Indica si se está editando un usuario
    },
    methods: {
        saveUser() {
        // Evita la mutación directa de la prop "user"
        const userCopy = { ...this.user }; // Crea una copia del usuario
        // Lógica para guardar o actualizar un usuario utilizando "userCopy"
        // Cerrar el modal después de guardar
        this.$emit("saveUser", userCopy);
        },
    },
};
</script>
  