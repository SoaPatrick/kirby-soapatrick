window.addEventListener(
  "load",
  function () {
    const getItemX = (index) => {
      var item = navItems.item(index);
      var itemOffset = item.getBoundingClientRect().left + window.scrollX;
      var itemWidth = item.offsetWidth;
      var menuOffset = nav.getBoundingClientRect().left + window.scrollX;
      var dragAreaWidth = dragArea.offsetWidth;
      var returnValue =
        menuOffset - itemOffset + (dragAreaWidth - itemWidth) / 2;
      returnValue = returnValue.toFixed(0);
      return returnValue;
    };

    let dragArea = document.getElementById("drag");
    const dragAreaHeight = dragArea.offsetHeight;
    const dragHandle = document.getElementById("drag-handle");
    const navSearch = document.getElementById("nav-search");
    const navSearchInput = document.getElementById("nav-search__input");
    const nav = document.getElementById("nav");
    const navItems = nav.children;
    const navItemsCount = navItems.length;
    let pointStart;
    let url;
    let isPressed = false;
    let isEmpty = false;
    let isSearch = false;
    let pullTotal = 200;
    let release = 80;
    let pullRelease = pullTotal + release;
    let index;
    let pullStep = pullTotal / navItemsCount;

    dragArea.addEventListener(
      "pointerdown",
      function (e) {
        if (!isSearch) {
          isPressed = true;
          pointStart = e.pageY;
          dragArea.classList.remove("bounce");
          e.preventDefault();
          navSearch.classList.remove("show");
        }
      },
      false
    );

    document.addEventListener(
      "pointermove",
      function (e) {
        if (isPressed) {
          var diff = Math.max(0, (e.pageY - pointStart) * -1);
          if (diff > pullRelease)
            diff = pullRelease + (diff - pullRelease) / (diff * 0.01);

          dragArea.style.height = dragAreaHeight + diff + "px";

          index = Math.max(
            0,
            Math.min(navItemsCount - 1, Math.floor((diff - release) / pullStep))
          );
          if (diff > pullRelease + pullStep * 2) index = navItemsCount - 1;

          if (diff > release) {
            nav.classList.add("show");
            dragHandle.classList.add("fade-out");
            isEmpty = true;
          } else {
            nav.classList.remove("show");
            dragHandle.classList.remove("fade-out");
            isEmpty = false;
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

    document.addEventListener(
      "pointerup",
      function (e) {
        if (isPressed) {
          if (
            isEmpty &&
            !navItems.item(index).classList.contains("active") &&
            index != navItemsCount - 1
          )
            window.location.href = url;
          for (let i = 0; i < navItems.length; i++) {
            navItems.item(i).classList.remove("show");
          }
          if (index == navItemsCount - 1) {
            dragArea.classList.add("bounce");
            dragArea.style.height = 100 + "vh";
            navSearch.classList.add("show");
            navSearchInput.focus();
            isSearch = true;
          } else {
            dragArea.style.height = dragAreaHeight + "px";
            dragArea.classList.add("bounce");
            dragHandle.classList.remove("fade-out");
          }
          isPressed = false;
          nav.classList.remove("show");
          e.preventDefault();
        }
      },
      false
    );

    navSearchInput.addEventListener("focusout", () => {
      dragArea.style.height = dragAreaHeight + "px";
      dragArea.classList.add("bounce");
      nav.classList.remove("show");
      dragHandle.classList.remove("fade-out");
      isPressed = false;
      navSearch.classList.remove("show");
      isSearch = false;
      dragArea.classList.remove("top-0");
      dragArea.classList.add("bottom-0");
    });
  },
  false
);
