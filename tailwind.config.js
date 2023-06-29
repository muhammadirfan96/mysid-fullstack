/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./app/Views/**/*.php", "./app/Views/*.php"],
  theme: {
    extend: {},
    fontFamily: {
      andika: ["Andika"],
      din: ["DIN"],
      bi: ["bootstrap-icons"],
    },
  },
  plugins: [],
}

