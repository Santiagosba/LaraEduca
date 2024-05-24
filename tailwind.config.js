import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                hackerBg: '#1a1a2e', // fondo oscuro
                hackerPurple: '#6a0dad', // morado
                hackerViolet: '#8a2be2', // violeta
                hackerBlue: '#4b0082', // azul índigo
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
                hacker: ['"Courier New"', 'monospace'], // tipografía tipo hacker
            },
        },
    },

    plugins: [forms, typography],
};
