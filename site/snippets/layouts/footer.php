<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer class="site-footer">
    <span>Stuff from 2000 to <?= date('Y'); ?></span>
    <span><a href="<?= page('log')->url() ?>">SP10</a></span>
    <span><a href="<?= page('privacy')->url() ?>">Privacy</a></span>
  </footer>
</div>
<?= vite()->js($entry) ?>
</body>
</html>