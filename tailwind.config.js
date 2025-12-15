/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./storage/framework/views/*.php",
  ],
  theme: {
    extend: {
      colors: {
        'insti-blue': '#1e3a8a',
        'insti-indigo': '#3730a3',
      },
      fontFamily: {
        'sans': ['Inter', 'system-ui', 'sans-serif'],
      },
    },
  },
  plugins: [],
}