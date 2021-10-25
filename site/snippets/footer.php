<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>

  </main>
<?= vite()->js($entry) ?>
</body>
</html>