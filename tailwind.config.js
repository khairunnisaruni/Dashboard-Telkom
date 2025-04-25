/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
      "./resources/**/*.blade.php",
      "./resources/**/*.js",
      "./resources/**/*.vue",
    ],
    theme: {
      extend: {
        colors: {
            'telkom-red': '#E42313',
            'telkom-second-red': '#ec655a'
        }
      },
    },
    plugins: [],
  }
