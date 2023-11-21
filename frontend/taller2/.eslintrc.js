module.exports = {
    root: true, // Indica que esta configuración es la raíz
    env: {
      node: true, // Configuración para entorno Node.js
    },
    extends: [
      'eslint:recommended', // Usa las reglas recomendadas por ESLint
      'plugin:vue/vue3-recommended', // Para proyectos Vue 3
    ],
    parserOptions: {
      parser: 'babel-eslint', // Usa Babel como analizador
    },
    rules: {
      // Aquí puedes agregar reglas personalizadas o modificar las existentes
    },
  };
  