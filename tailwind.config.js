const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require("tailwindcss/colors");

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                gray: colors.trueGray,
                'gray-background' : '#f7f8fc',
                'blue' : '#328af1',
                'blue-hover' : '#2879bd',
                'yellow' : '#2879bd',
                'red' : '#ec454f',
                'green' : '#1aab86',
                'purple' : '#8b60ed',
            },
            fontFamily: {
                sans: ['Open Sans', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
