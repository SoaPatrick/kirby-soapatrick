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
        large: "var(--width--large)",
        gutter: "var(--width--gutter)",
      },
      width: {
        content: "var(--width--content)",
        large: "var(--width--large)",
        wide: "var(--width--wide)",
        cover: "var(--width--cover)",
      },
      maxWidth: {
        content: "var(--width--content)",
        large: "var(--width--large)",
        wide: "var(--width--wide)",
        full: "var(--width--full)",
      },
      height: {
        cover: "var(--width--cover)",
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
};
