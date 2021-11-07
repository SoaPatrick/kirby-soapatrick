<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer class="mt-16 text-sm mb-32 sm:mb-9">
    <p class="m-0">Stuff from 2000 to <?= date('Y'); ?> by SoaPatrick<a href="<?= url('/log') ?>">Ten</a></p>
  </footer>
  <div class="fixed z-50 bottom-0 left-0 right-0 bg-primary text-white px-8 pt-6 pb-10 bounce sm:hidden" id="drag">
    <h1 class="m-0 text-center text-base" id="drag-title">drag me up!</h1>
    <nav id="nav" class="hidden h-full flex justify-center items-center">
      <a href="<?= page('home')->url() ?>"><?= page('home')->title() ?></a>
      <?php foreach($site->children()->listed() as $child): ?>
        <a href="<?= $child->url() ?>"><?= $child->title() ?></a>
      <?php endforeach ?>
      <span>Cancel</span>
    </nav>
  </div>
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