const { defineConfig } = require('@vue/cli-service')

module.exports = defineConfig({
  transpileDependencies: [
    'vue-router', // Ejemplo: agrega las dependencias que deseas transpilar aquí
    'vuex',
    // Otras dependencias que necesitan ser transpiladas
  ]
})
