module.exports = {
  purge: ["../**/*.php"],
  darkMode: "media", // or 'media' or 'class'
  theme: {
    fontFamily: {
      sans: ["Lato", "sans-serif"],
      serif: ["Recoleta", "serif"],
    },
    fill: {
      primary: "var(--color__primary)",
      black: "#222222",
      white: "#fff",
    },
    colors: {
      transparent: "transparent",
      black: "#222222",
      white: "#fff",
      primary: "var(--color__primary)",
      "black-10": "rgba(0,0,0,.1)", // is set somewhere else
    },
    extend: {
      transitionProperty: {
        height: "height, max-height",
        menu: "left, padding-left",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
