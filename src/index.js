import "./index.scss";

import "fslightbox";
import "./scripts/feedbtn";
import "./scripts/toggleSearch";
import "./scripts/prism";
import { mount } from 'svelte';
import Factory from "./svelte/Factory.svelte";
import Lab from "./svelte/Lab.svelte";
import lazyframe from "./scripts/lazyframe";

lazyframe(".lazyframe");


const factoryElement = document.getElementById("factory");
if (factoryElement) {
  mount(Factory, { target: factoryElement });
}

const labElement = document.getElementById("lab");
if (labElement) {
  mount(Lab, { target: labElement });
}