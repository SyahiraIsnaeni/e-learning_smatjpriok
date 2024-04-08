/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./resources/views/**/*.blade.php'],
    theme: {
        extend: {
            colors: {
                'biru-tua' : '#02455C',
                'biru-muda' : '#F0FBFF',
                'oren': '#EE982B'
            },
        },
        fontFamily: {
            'learn': ['Open Sans'],
        },
    },
    plugins: [],
}


