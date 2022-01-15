module.exports = {
  content: ["../**/*.php"],
  theme: {
    fontFamily: {
      sans: ["Lato", "sans-serif"],
      serif: ["Recoleta", "serif"],
    },
    fill: {
      primary: "var(--color__primary)",
      "egg-200": "#F9F7F1",
    },
    colors: {
      transparent: "transparent",
      primary: "var(--color__primary)",
      "cyan-62": "var(--color__cyan-62)",
      "cyan-35": "var(--color__cyan-35)",
      "blue-100": "var(--color__blue--100)",
      "blue-200": "var(--color__blue--200)",
      "egg-100": "var(--color__egg--100)",
      "egg-200": "var(--color__egg--200)",
    },
    screens: {
      sm: "800px",
    },
    dropShadow: {
      "subnav-blue": "0 0 2rem rgba(255, 255, 255, 0.25)",
      "subnav-egg": "0 0 2rem rgba(0, 0, 0, 0.25)",
    },
    extend: {
      transitionProperty: {
        height: "height, max-height",
        menu: "left, padding-left",
      },
      content: {
        link: "'⤻'",
      },
      gap: {
        gutter: "var(--width--gutter)",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
