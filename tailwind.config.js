import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        container: {
            center: true,
        },
        extend: {
            backgroundImage:{
                'hero': "url('../../public/img/hero-background.png')",
            },

            screens: {
                'sm': '320px',
                // => @media (min-width: 320px) { ... }

                'md': '640px',
                // => @media (min-width: 640px) { ... }

                'lg': '1024px',
                // => @media (min-width: 1280px) { ... }

                'xl': '1280px',
                // => @media (min-width: 1280px) { ... }
            },

            //space between lines
            lineHeight: {
                'extra-loose': '2.5',
                '12': '3rem',
            },

            colors: {
                'quienes': '#2B2833',
                'fondo': '#E8E8E8',
                'grayd': '#202622',
                'secondary': '#4518c2',
                'tertiary': '#a082f5',
                'record': '#5E5F5E',
                'gray-2': '#B9B9B9',
            },

            gridTemplateColumns: {
                // Simple 16 column grid
                '16': 'repeat(16, minmax(0, 1fr))',

                // Complex site-specific column configuration
                'footer': '200px minmax(900px, 1fr) 100px',
            },

            fontFamily: {
                secondary: ['Volkhov'],
                primary: ['Kanit'],
            }
        },
    },

    plugins: [forms],
};
