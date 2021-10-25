module.exports = {
  purge: ["../**/*.php"],
  darkMode: "class", // or 'media' or 'class'
  theme: {
    colors: {
      transparent: "transparent",
      black: "#000",
      white: "#fff",
      primary: "var(--color__primary)", // is set somewhere else
    },
    extend: {},
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
