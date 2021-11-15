window.addEventListener(
  "load",
  function () {
    const getItemX = (index) => {
      var item = navItems.item(index);
      var item_offset = item.getBoundingClientRect().left + window.scrollX;
      var item_width = item.offsetWidth;
      var menu_offset = nav.getBoundingClientRect().left + window.scrollX;
      var screen_width = drag.offsetWidth;
      var return_value =
        menu_offset - item_offset + (screen_width - item_width) / 2;
      return_value = return_value.toFixed(0);
      return return_value;
    };

    let drag = document.getElementById("drag");
    const dragHeight = drag.offsetHeight;
    const nav = document.getElementById("nav");
    let navItems = nav.children;
    let menu_items_count = navItems.length;
    let start_y;
    let url;
    let is_pressed = false;
    let total_pull = 280;
    let release = 100;
    let pull_release = total_pull + release;
    let index;
    let pull_step = total_pull / menu_items_count;

    document.addEventListener(
      "pointerdown",
      function (e) {
        is_pressed = true;
        start_y = e.pageY;
        drag.classList.remove("bounce");
        e.preventDefault();
      },
      false
    );

    document.addEventListener(
      "pointermove",
      function (e) {
        if (is_pressed) {
          var diff = Math.max(0, (e.pageY - start_y) * -1);
          console.log("diff: " + diff);
          if (diff > pull_release)
            diff = pull_release + (diff - pull_release) / (diff * 0.01);

          drag.style.height = dragHeight + diff + "px";

          index = Math.max(
            0,
            Math.min(
              menu_items_count - 1,
              Math.floor((diff - release) / pull_step)
            )
          );
          if (diff > pull_release + pull_step * 2) index = menu_items_count - 1;

          if (diff > release) {
            nav.classList.remove("hidden");
          } else {
            nav.classList.add("hidden");
          }

          for (let i = 0; i < navItems.length; i++) {
            navItems.item(i).classList.remove("show");
          }
          navItems.item(index).classList.add("show");
          url = navItems.item(index).href;

          nav.style.transform = "translate3d(" + getItemX(index) + "px,0,0)";
          for (let i = 0; i < navItems.length; i++) {
            navItems.item(i).classList.remove("show");
          }
          navItems.item(index).classList.add("show");

          e.preventDefault();
        }
      },
      false
    );

    drag.addEventListener(
      "pointerup",
      function (e) {
        if (is_pressed) {
          if (!navItems.item(index).classList.contains("active"))
            window.location.href = url;
          for (let i = 0; i < navItems.length; i++) {
            navItems.item(i).classList.remove("show");
          }
          drag.style.height = dragHeight + "px";
          drag.classList.add("bounce");
          nav.classList.add("hidden");
          is_pressed = false;
          e.preventDefault();
        }
      },
      false
    );
  },
  false
);
