<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer class="mt-16 mb-9 text-sm">
    <p class="m-0">Stuff from 2000 to <?= date('Y'); ?> by SoaPatrick<a href="<?= page('log') ?>">Ten</a></p>
  </footer>
</div>
<?php
// check if code block exists to load specific scripts
$blockType = 'code';
$doesBlockXExist = $page->text()->filterBy('type', $blockType);
//e($doesBlockXExist->isNotEmpty(), 'is true', 'is false');
?>
<?= vite()->js($entry) ?>
</body>
</html>