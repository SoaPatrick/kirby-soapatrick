import "./index.scss";
import "fslightbox";
//import "./scripts/toggleTheme";
import "./scripts/toggleSearch";

console.log("shared");

window.addEventListener(
  "load",
  function () {
    let drag = document.getElementById("drag");
    const dragHeight = drag.offsetHeight;
    const nav = document.getElementById("nav");
    let navItems = nav.children;
    let dragTitle = document.getElementById("drag-title");
    let starty = 0;
    let url = "#";
    let redirect = false;

    drag.addEventListener(
      "touchstart",
      function (e) {
        let touchobj = e.changedTouches[0];
        starty = parseInt(touchobj.clientY);
        e.preventDefault();
        this.classList.remove("bounce");
      },
      false
    );

    drag.addEventListener(
      "touchmove",
      function (e) {
        let touchobj = e.changedTouches[0];
        let dist = (parseInt(touchobj.clientY) - starty) * -1;
        let opacity = (100 - (parseInt(touchobj.clientY) - starty) * -4) / 100;

        this.style.height =
          (parseInt(touchobj.clientY) - starty) * -1 + dragHeight + "px";
        for (let i = 0; i < navItems.length; i++) {
          navItems.item(i).classList.remove("active");
        }
        if (dist > 50) {
          nav.classList.remove("hidden");
        } else {
          nav.classList.add("hidden");
        }
        if (dist > 50 && dist <= 100) {
          navItems.item(0).classList.add("active");
          redirect = true;
          url = navItems.item(0).href;
        } else if (dist > 101 && dist <= 150) {
          navItems.item(1).classList.add("active");
          redirect = true;
          url = navItems.item(1).href;
        } else if (dist > 151 && dist <= 200) {
          navItems.item(2).classList.add("active");
          redirect = true;
          url = navItems.item(2).href;
        } else if (dist > 201 && dist <= 250) {
          navItems.item(3).classList.add("active");
          redirect = true;
          url = navItems.item(3).href;
        } else if (dist > 251 && dist <= 300) {
          navItems.item(4).classList.add("active");
          redirect = true;
          url = navItems.item(4).href;
        } else if (dist > 301 && dist <= 350) {
          navItems.item(5).classList.add("active");
          redirect = true;
          url = navItems.item(5).href;
        } else if (dist > 351) {
          navItems.item(6).classList.add("active");
          redirect = false;
        }
        dragTitle.style.opacity = opacity;
        e.preventDefault();
      },
      false
    );

    drag.addEventListener(
      "touchend",
      function (e) {
        e.preventDefault();
        this.style.height = dragHeight + "px";
        this.classList.add("bounce");
        for (let i = 0; i < navItems.length; i++) {
          navItems.item(i).classList.remove("active");
        }
        dragTitle.style.opacity = 1;
        nav.classList.add("hidden");
        if (redirect) {
          window.location.href = url;
        }
      },
      false
    );
  },
  false
);
