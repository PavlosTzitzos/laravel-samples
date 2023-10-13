import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/base_css.css',
                'resources/css/base_css_Final.css',
                'resources/css/css_selection.css',
                'resources/css/homepage.css',
                'resources/css/login_to_show_selection.css',
                'resources/css/player.css',
                'resources/css/schedule.css',
                'resources/css/style.css',
                'resources/js/app.js',
                'resources/js/bootstrap.js',
                'resources/js/jquery.js',
                'resources/js/jquery-3.6.4.js',
                'resources/js/player.js',
                'resources/js/scheduler.js',
                'resources/js/selection.js',
            ],
            refresh: true,
        }),
    ],
});
