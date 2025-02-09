import "./index.scss";

import "fslightbox";
import "./scripts/feedbtn";
import "./scripts/toggleSearch";
import "./scripts/prism";
import { mount } from 'svelte';
import Factory from "./svelte/Factory.svelte";
import lazyframe from "./scripts/lazyframe";

lazyframe(".lazyframe");


const targetElement = document.getElementById("factory");

if (targetElement) {
  mount(Factory, { target: targetElement });
}