<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer>
    <p class="m-0">Stuff from 2000 to <?= date('Y'); ?> by SoaPatrick</p>
  </footer>
</div>
<?= vite()->js($entry) ?>
</body>
</html>