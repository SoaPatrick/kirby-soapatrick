//import "./three.js";
import "@/index.js";
import "./index.scss";

// Add RSS Feed Button with Copy Function
if (document.getElementById("feed-button")) {
  var feedBtn = document.getElementById("feed-button");
  var feedBtnTooltip = document.getElementById("feed-tooltip");
  var feedBtnTooltipText = feedBtnTooltip.innerHTML;

  feedBtn.addEventListener("click", async (event) => {
    console.log("button clicked");
    if (!navigator.clipboard) {
      return;
    }

    try {
      var copy_value = event.srcElement.getAttribute("data-copy");
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
