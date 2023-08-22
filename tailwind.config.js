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
                'auth': "url('/public/assets/img/6CeuCO.jpg')",
            },
            button: {
                'btn-lg': "h-12 px-6 m-2 text-lg",
                'btn-md': "h-10 px-5 m-2",
                'btn-sm': "h-8 px-4 text-sm",
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')({
            charts: true
        }),
    ],
};
