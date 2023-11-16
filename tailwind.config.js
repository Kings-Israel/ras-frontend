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
                sans: ['CenturyGothic', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: {
                'auth': "url('/ras/assets/img/6CeuCO.jpg')",
                'auth-alt': "url('/ras/assets/img/auth-bg-1.png')",
                'auth-alt-two': "url('/ras/assets/img/auth-alt-three.jpg')",
                'auth-alt-three': "url('/ras/assets/img/auth-alt-four.jpg')",
                'auth-alt-four': "url('/ras/assets/img/auth-alt-five.jpg')",
                'auth-alt-five': "url('/ras/assets/img/auth-alt-six.jpg')",
                'hero': "url('/ras/assets/img/banner.png')",
            },
            screens: {
                '4xl': '1900px'
            },
            colors: {
                'primary-one': '#EE5D32',
                'primary-two': '#6F1310',
                'secondary-one': '#FFE5D3',
                'secondary-two': '#F2F2F2',
                'secondary-three': '#FFFFFF',
                'secondary-four': '#F9CB0B',
                'secondary-five': '#30D1D1',
                'secondary-six': '#00D666',
                'primary-three': '#F8F7F0'
            },
        },
    },

    plugins: [
        forms,
        require('flowbite/plugin')({
            charts: true,
        }),
    ],
};
