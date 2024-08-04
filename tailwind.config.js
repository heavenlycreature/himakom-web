/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      backgroundImage:{
        'error-page' : "url('/public/img/background/error-page.png')",
        'about': "url('/public/img/background/backgroundhalamankahim.png')"
      }
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

