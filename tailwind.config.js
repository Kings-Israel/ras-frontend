import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./node_modules/flowbite/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'auth': "url('/ras/assets/img/6CeuCO.jpg')",
                'hero': "url('/ras/assets/img/index.jpg')",
            },
            screens: {
                '4xl': '1900px'
            }
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')({
            charts: true,
        }),
    ],
};
