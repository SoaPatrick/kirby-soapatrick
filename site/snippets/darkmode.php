  <script>
    if (localStorage.theme === 'dark' || !('theme' in localStorage)) {
      document.documentElement.classList.add('dark')
      localStorage.theme = "dark";
    } else {
      document.documentElement.classList.remove('dark')
      localStorage.theme = "light";
    }
  </script>