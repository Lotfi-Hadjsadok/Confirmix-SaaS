/** @type {import('tailwindcss').Config} */
const colors = require("tailwindcss/colors");

export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./app/**/*.php",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    darkMode: "selector",
    theme: {
        colors: {
            ...colors,
            primary: {
                DEFAULT: colors.violet[700],
                dark: colors.violet[600],
            },
            secondary: {
                DEFAULT: colors.blue[700],
                dark: colors.blue[600],
            },
            surface: {
                dark: colors.gray[900],
                light: colors.white,
                alt: colors.gray[800],
            },
            info: colors.sky[600],
            error: colors.red[500],
            warning: colors.amber[500],
            success: colors.green[600],
        },
    },
    plugins: [require("@tailwindcss/forms")],
};
