/** @type {import('tailwindcss').Config} */
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js", // Incluye Flowbite
        "./resources/**/*.html",
    ],
    theme: {
        extend: {
            colors: {
                body: '#E4E9F7',
                sidebar: '#FFFFFF',
                primary: '#695CFE',
                'primary-light': '#F6F5FF',
                toggle: '#DDD',
                text: '#707070',
                'text-dark': '#CCC',
                // Colores para el modo oscuro
                'body-dark': '#18191A',
                'sidebar-dark': '#242526',
                'primary-dark': '#3A3B3C',
                'toggle-dark': '#FFFFFF',
            },
            fontFamily: {
                poppins: ['Poppins', 'sans-serif'],
            },
            transitionProperty: {
                'tran-02': 'all 0.2s ease',
                'tran-03': 'all 0.3s ease',
                'tran-04': 'all 0.4s ease',
                'tran-05': 'all 0.5s ease',
            },
        },
    },
    darkMode: 'class', // Habilitar modo oscuro basado en clases
    plugins: [
        require('flowbite/plugin'),
    ],
};
