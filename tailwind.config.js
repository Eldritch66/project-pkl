/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    DEFAULT: '#0f4c81',
                    dark: '#0d3f6b',
                    light: '#e8f0f8',
                },
            },
            fontFamily: {
                sans: ['system-ui', '-apple-system', 'Segoe UI', 'Roboto', 'Arial', 'sans-serif'],
            },
        },
    },
    plugins: [],
};
