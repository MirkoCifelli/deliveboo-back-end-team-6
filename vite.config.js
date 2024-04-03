import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

import path from 'path';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/scss/app.scss',
                'resources/scss/layout.scss',
                'resources/scss/dashboard.scss',
                'resources/scss/menu.scss',
                'resources/scss/restaurantCreate.scss',
                'resources/scss/dishView.scss',
                'resources/scss/DishesIndex.scss',
                'resources/scss/guest-layout.scss',
                'resources/scss/login-registration.scss',
                'resources/scss/ordersIndex.scss',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '~resources': '/resources/',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),
        }
    },
});
