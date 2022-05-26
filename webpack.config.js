const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@style': path.resolve(__dirname, 'resources/styles'),

            '@const': path.resolve(__dirname, 'resources/js/constants'),
            '@pages': path.resolve(__dirname, 'resources/js/pages'),
            '@store': path.resolve(__dirname, 'resources/js/store'),
            '@middlewares': path.resolve(__dirname, 'resources/js/middlewares'),
            '@plugins': path.resolve(__dirname, 'resources/js/plugins'),
            '@components': path.resolve(__dirname, 'resources/js/components')
        }
    }
};
