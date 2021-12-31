module.exports = {
  content: ["../**/*.php"],
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
      "white-10": "rgba(255,255,255,.1)",
      primary: "var(--color__primary)",
      "black-10": "rgba(0,0,0,.1)",
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
