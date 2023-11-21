<template>
    <div>
        <h1>Iniciar sesión</h1>
        <form @submit.prevent="login">
            <label for="username">Usuario:</label>
            <input id="username" v-model="username" type="text" required>
            <label for="password">Contraseña:</label>
            <input type="password" id="password" v-model="password" required>
            <button type="submit">Iniciar sesión</button>
        </form>
        <button @click="logout">Cerrar sesión</button>
    </div>
</template>

<script>
import axios from 'axios'; // Importa Axios

export default {
    data() {
        return {
            username: '',
            password: ''
        }
    },
    methods: {
        async login() {
            try {
                // Realiza una solicitud HTTP al backend para autenticar al usuario
                const response = await axios.post('/api/login', {
                    username: this.username,
                    password: this.password
                });

                // Si las credenciales son válidas, el backend debe responder con un token JWT
                const token = response.data.token;

                // Almacena el token en el almacenamiento local (localStorage) o en Vuex según tus preferencias
                localStorage.setItem('token', token);

                // Redirige al usuario a la página principal u otra página después de iniciar sesión
                this.$router.push('/dashboard'); // Asegúrate de configurar tus rutas correctamente

            } catch (error) {
                // Maneja los errores de autenticación, por ejemplo, muestra un mensaje de error al usuario
                console.error('Error al iniciar sesión:', error);
                alert('Credenciales incorrectas. Por favor, inténtalo de nuevo.');
            }
        },
        logout() {
            // Aquí puedes agregar la lógica para cerrar sesión
            // Por ejemplo, elimina el token almacenado en el cliente
            localStorage.removeItem('token');

            // Redirige al usuario a la página de inicio de sesión
            this.$router.push('/login'); // Asegúrate de configurar tus rutas correctamente
        }
    }
}
</script>

<style>
/* Agrega tus estilos personalizados aquí */
</style>
  
