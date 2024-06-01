import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import viteCompression from 'vite-plugin-compression'

export default defineConfig({
    plugins: [
        viteCompression(),
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
