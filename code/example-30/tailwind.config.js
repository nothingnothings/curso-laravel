/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                laracasts: "rg(50, 138, 241)",
                black: "#060606",
            },
            fontFamily: {
                sans: ["'Hanken Grotesk', sans-serif"],
            },
            fontSize: {
                '2xs':  '0.625rem'
            },
        },
    },
    plugins: [],
};
