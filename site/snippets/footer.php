<?php
/** @var Kirby\Cms\Page $page */
$template = $page->template();
$entry = "templates/$template/index.js";
?>
  </main>
  <footer class="mt-16 text-sm mb-32 sm:mb-9">
    <p class="m-0">Stuff from 2000 to <?= date('Y'); ?> by SoaPatrick<a href="<?= url('/log') ?>">Ten</a></p>
  </footer>
</div>
<div class="fixed z-50 bottom-0 left-0 right-0 text-white bounce sm:hidden flex flex-col" id="drag">
  <div class="m-0 text-center text-base">
    <div class="bg-primary p-4 pb-6">
      drag up!
    </div>
  </div>
  <div class="bg-primary flex-1">
    <nav id="nav" class="hidden h-full flex justify-center items-center">
      <a href="<?= page('home')->url() ?>" <?php e($page->isHomePage(), 'class="active"') ?>>Home</a>
      <?php foreach($site->children()->listed() as $child): ?>
        <a <?php e($child->isActive(), 'class="active"') ?>href="<?= $child->url() ?>"><?= $child->title() ?></a>
      <?php endforeach ?>
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