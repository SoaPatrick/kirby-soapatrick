// Add RSS Feed Button with Copy Function
(function () {
  const feedBtn = document.getElementById("feed-button");
  if (!feedBtn) return;

  const feedBtnTooltip = document.getElementById("feed-tooltip");
  const defaultTooltip = feedBtnTooltip?.textContent ?? "";

  function setTooltip(text, copied = false) {
    if (!feedBtnTooltip) return;
    feedBtnTooltip.textContent = text;
    feedBtnTooltip.classList.toggle("copied", copied);
  }

  function resetTooltip() {
    setTooltip(defaultTooltip, false);
  }

  feedBtn.addEventListener("click", async (e) => {
    const el = e.currentTarget || feedBtn;
    const value = el.dataset.copy;

    if (!value) {
      console.warn("data-copy ist leer oder fehlt");
      return;
    }

    try {
      if (!navigator.clipboard || !navigator.clipboard.writeText) {
        throw new Error("Async Clipboard API nicht verfügbar");
      }
      await navigator.clipboard.writeText(value);
      setTooltip("URL copied", true);
    } catch (err) {
      try {
        const ta = document.createElement("textarea");
        ta.value = value;
        ta.setAttribute("readonly", "");
        ta.style.position = "absolute";
        ta.style.left = "-9999px";
        document.body.appendChild(ta);
        ta.select();
        document.execCommand("copy");
        document.body.removeChild(ta);
        setTooltip("URL copied", true);
      } catch (err2) {
        console.error("Copy failed", err, err2);
        setTooltip("Copy failed");
      }
    }
  });

  feedBtn.addEventListener("mouseleave", resetTooltip);
  feedBtn.addEventListener("focusout", resetTooltip);
})();