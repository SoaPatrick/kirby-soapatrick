// Add RSS Feed Button with Copy Function
if (document.getElementById("feed-button")) {
  let feedBtn = document.getElementById("feed-button");
  let feedBtnTooltip = document.getElementById("feed-tooltip");
  let feedBtnTooltipText = feedBtnTooltip.innerHTML;

  feedBtn.addEventListener("click", async (event) => {
    console.log("button clicked");
    if (!navigator.clipboard) {
      return;
    }

    try {
      let copy_value = event.getAttribute("data-copy");
      await navigator.clipboard.writeText(copy_value);
      feedBtnTooltip.innerHTML = "URL copied";
      feedBtnTooltip.classList.add("copied");
    } catch (error) {
      console.error("copy failed", error);
    }
  });

  feedBtn.addEventListener("mouseout", function () {
    feedBtnTooltip.classList.remove("copied");
    feedBtnTooltip.innerHTML = feedBtnTooltipText;
  });

  feedBtn.addEventListener("focusout", function () {
    feedBtnTooltip.classList.remove("copied");
    feedBtnTooltip.innerHTML = feedBtnTooltipText;
  });
}