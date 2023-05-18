import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./vendor/laravel/jetstream/**/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],

    corePlugins: {
        container: false,
    },

    safelist: [
        "bg-red-600",
        "bg-yellow-600",
        "bg-green-600",
        "bg-blue-600",
        "bg-indigo-600",
        "bg-purple-600",
        "bg-pink-600",
        "bg-rose-600",
        "bg-teal-600",
        "bg-orange-600",
        "bg-sky-600",
        "bg-lime-600",
    ],
};
