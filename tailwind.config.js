import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        'node_modules/preline/dist/*.js',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                sans: ["Roboto", "sans-serif"], // Texte principal
                title: ["Montserrat", "sans-serif"], // Titres
            },
        },
    },
    darkMode: "class",
    plugins: [forms,
        require("preline/plugin"),

        require('@tailwindcss/forms'),
    ],
};
