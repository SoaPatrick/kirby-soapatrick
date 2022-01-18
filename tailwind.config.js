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
      current: "currentColor",
      transparent: "transparent",
      primary: "var(--color__primary)",
      "cyan-62": "var(--color__cyan-62)",
      "cyan-35": "var(--color__cyan-35)",
      "blue-50": "var(--color__blue--50)",
      "blue-100": "var(--color__blue--100)",
      "blue-200": "var(--color__blue--200)",
      "egg-50": "var(--color__egg--50)",
      "egg-100": "var(--color__egg--100)",
      "egg-200": "var(--color__egg--200)",
    },
    screens: {
      sm: "800px",
    },
    textUnderlineOffset: {
      default: "0.25em",
    },
    textDecorationThickness: {
      thin: "0.01em",
      normal: "2px",
    },
    gridTemplateRows: {
      masonry: "masonry",
    },
    extend: {
      transitionProperty: {
        height: "height, max-height",
        menu: "left, padding-left",
        link: "text-decoration-color",
        "img-hover": "background-color, background-image, opacity",
      },
      content: {
        link: "'⤻'",
        hashtag: "'#'",
      },
      gap: {
        gutter: "var(--width--gutter)",
      },
      margin: {
        gutter: "var(--width--gutter)",
        wide: "var(--width--wide)",
      },
      width: {
        content: "var(--width--content)",
        wide: "var(--width--wide)",
        cover: "var(--width--cover)",
      },
      maxWidth: {
        content: "var(--width--content)",
        wide: "var(--width--wide)",
        widest: "var(--width--widest)",
      },
      height: {
        cover: "var(--width--cover)",
      },
      gridTemplateColumns: {
        storage: "repeat(auto-fit, minmax(6.5rem, 1fr))",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
