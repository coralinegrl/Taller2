module.exports = {
    chainWebpack: config => {
       config.module
          .rule('vue')
          .use('vue-loader')
          .loader('vue-loader')
          .tap(options => {
             // Personaliza las opciones de vue-loader si es necesario
             return options;
          });
    },
 };
 