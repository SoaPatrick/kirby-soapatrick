import "./index.scss";

import "fslightbox";
import "./scripts/toggleSearch";
import "./scripts/prism";
import lazyframe from "./scripts/lazyframe";

lazyframe(".lazyframe");

import Factory from "./svelte/Factory.svelte";

new Factory({
  target: document.getElementById("factory"),
});
