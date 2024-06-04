import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/cards.css', 
                'resources/css/footer.css', 
                'resources/css/header.css', 
                'resources/css/home.css', 
                'resources/css/header.css', 
                'resources/css/index.css', 
                'resources/css/movie.css',

                'resources/js/app.js',
                'resources/js/cards.js',
                'resources/js/header.js',
                'resources/js/movie.js',
            ],
            refresh: true,
        }),
    ],
});
