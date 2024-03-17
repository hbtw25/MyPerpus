/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.{blade.php,js,vue}",
        "./node_modules/flowbite/**/*.js",
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
    ],
    theme: {
        extend: {
            colors: {
                "royal-blue": "#4737FF",
                "battleship-grey": "#9A9EA6",
                "midnight-blue": "#181E4B",
                "slate-grey": "#5E6282",
                "dodger-blue": "#4475F2",
                "ash-grey": "#9C9C9C",
                "pale-silver": "#DEDEDE",
                "sky-cyan": "#23A6F0",
            },
        },
        fontFamily: {
            sans: ["Plus Jakarta Sans", "Helvetica", "Arial", "sans-serif"],
        },
    },
    plugins: [require("@tailwindcss/forms"), require("flowbite")],
};
