/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        colors: {
            dark: "#1f1f1f",
            dlight: "#353535",
            ldark: "#8c8c8b",
            light: "#fafafa",
            primary: "#0F4B80",
            secondary: "#1A80C8",
            tertiary: "#248096",
            danger: "#c41414",
            success: "#3ab62c",
        },
        extend: {},
    },
    plugins: [],
};
