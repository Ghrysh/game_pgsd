import defaultTheme from 'tailwindcss/defaultTheme';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                kidBlue: '#3b82f6',
                kidYellow: '#facc15',
                kidGreen: '#22c55e',
                kidBg: '#f0fdf4', // Hijau sangat muda untuk background
            }
        },
    },
    plugins: [],
};