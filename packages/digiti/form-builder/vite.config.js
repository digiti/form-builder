import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            publicDirectory: 'dist',
            input: ['resources/scss/main.scss', 'resources/js/main.js'],
            refresh: true,
        })
    ],
});
