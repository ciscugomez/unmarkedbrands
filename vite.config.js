import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import livewire from '@defstudio/vite-livewire-plugin'; // Here we import it

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/custom.css',
                'resources/js/app.js',
                'resources/css/filepond.min.css',
                'resources/css/trix.css'
            ],
            refresh: true,
        }),
        livewire({  // Here we add it to the plugins
            refresh: [
                'resources/css/app.css',
                'resources/css/custom.css',
                'resources/css/filepond.min.css',
                'resources/css/trix.css'
            ],
        }),
    ],
});
