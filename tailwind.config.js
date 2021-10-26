module.exports = {
  purge: ["../**/*.php"],
  darkMode: "class", // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ["Lato", "sans-serif"],
      serif: ["Recoleta", "serif"],
    },
    fill: {
      primary: "var(--color__primary)",
    },
    colors: {
      transparent: "transparent",
      black: "#222222",
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
