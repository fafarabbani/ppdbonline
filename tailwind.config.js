const defaultTheme = require("tailwindcss/defaultTheme");

/** @type {import('tailwindcss').Config} */
module.exports = {
    darkMode: "class",

    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/**/*.js",
    ],

    theme: {
        extend: {
            fontFamily: {
                display: ["Poppins", "sans-serif"],
                body: ["Inter", "sans-serif"],
                // sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },

            colors: {
                primary: "#0e674e",
                secondary: "#00966b",
                warning: "#FBBF24",
                dark: {
                    "eval-0": "#151823",
                    "eval-1": "#222738",
                    "eval-2": "#2A2F42",
                    "eval-3": "#2C3142",
                },
            },
        },
    },

    plugins: [require("@tailwindcss/forms")],
};
