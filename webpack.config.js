const path = require('path');

module.exports = {
    resolve: {
        alias: {
            '@images': path.resolve(__dirname, 'resources/images'),

            '@const': path.resolve(__dirname, 'resources/js/constants'),
            '@pages': path.resolve(__dirname, 'resources/js/pages'),
            '@store': path.resolve(__dirname, 'resources/js/plugins/store'),
            '@middlewares': path.resolve(__dirname, 'resources/js/middlewares'),
            '@plugins': path.resolve(__dirname, 'resources/js/plugins'),
            '@components': path.resolve(__dirname, 'resources/js/components')
        }
    }
};
