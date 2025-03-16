import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import react from '@vitejs/plugin-react';

export default defineConfig({
    plugins: [
        laravel({
            input: ['resources/js/app.jsx'],
            refresh: true,
        }),
        react(),
    ],
    server: {
        host: true, // Нужно для работы в Docker
        port: 5173, // Используем порт 5173
        strictPort: true,
        hmr: {
            host: 'localhost',
        },
    },
});
