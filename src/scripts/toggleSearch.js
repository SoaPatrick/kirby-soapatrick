// open/close search
var searchBtn = document.getElementById("searchToggle");
var searchForm = document.getElementById("search-collapse");
var searchField = document.getElementById("search-collapse__input");

searchBtn.onclick = function () {
  searchForm.classList.toggle("open");
  searchBtn.classList.toggle("active");
  document.body.scrollTop = 0; // For Safari
  document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
  if (!searchForm.classList.contains("hidden")) {
    searchField.value = "";
    searchField.focus();
  }
};
