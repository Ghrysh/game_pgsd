// vite.config.js
export default defineConfig({
    // Tambahkan baris base ini!
    base: '/kincir-air-interaktif/build/', 
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});