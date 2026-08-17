/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './app/**/*.php',
    ],
    theme: {
        extend: {
            colors: {
                primary: '#D91E18',
                secondary: '#10542C',
                'text-primary': '#161C22',
                'text-secondary': '#5D3F3B',
                background: '#FDFCF8',
            },
            fontFamily: {
                heading: ['"Playfair Display"', 'serif'],
                body: ['Inter', 'sans-serif'],
            },
            fontSize: {
                h1: '48px',
                h2: '40px',
                h3: '32px',
                h4: '28px',
                h5: '24px',
                h6: '20px',
            },
        },
    },
    plugins: [],
};
