/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [],
  theme: {
    extend: {
      colors: {
        tahiti: {
          test: "rgb(17 24 39 / 1)",
        },
      },
    },
  },
  plugins: [require("@fortawesome/fontawesome-free")],
  purge: [
    "./src/**/*.html",
    "./src/**/*.vue",
    "./src/**/*.jsx",
    "./node_modules/@fortawesome/**/*.js",
  ],
};
