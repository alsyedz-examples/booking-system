/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'media',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue"
    ],
    theme: {
        extend: {
            colors: {
                primary: {
                    '50': '#eff2fe',
                    '100': '#e1e8fe',
                    '200': '#c9d4fc',
                    '300': '#a8b7f9',
                    '400': '#8691f3',
                    '500': '#686dec',
                    '600': '#524cdf',
                    '700': '#463ec4',
                    '800': '#3a349f',
                    '900': '#33317e',
                    '950': '#1c1a42'
                }
            }
        }
    },
    plugins: [
        require('@tailwindcss/forms')
    ]
}
