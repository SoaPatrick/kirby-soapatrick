import "./index.scss";

import "fslightbox";
import "./scripts/toggleSearch";
import "./scripts/prism";
import lazyframe from "./scripts/lazyframe";

lazyframe(".lazyframe");

import Factory from "./svelte/Factory.svelte";

const targetElement = document.getElementById("factory");

if (targetElement) {
  new Factory({
    target: targetElement,
  });
}
