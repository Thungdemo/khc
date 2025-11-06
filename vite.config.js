import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/admin.scss',
                'resources/sass/portal.scss',
                'resources/js/admin.js',
                'resources/js/portal.js',
                'resources/js/admin/notice.js'
            ],
            refresh: true,
        }),
    ],
});
