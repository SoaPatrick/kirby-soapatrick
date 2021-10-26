<header class="bg-primary flex justify-between">
  <nav class="flex">
    <?php foreach($site->children() as $child): ?>
      <a class="px-4 py-3 text-white hover:bg-black hover:transition-colors hover:duration-700 dark:hover:bg-white dark:hover:text-black" href="<?= $child->url() ?>"><?= $child->title() ?></a>
    <?php endforeach ?>
  </nav>
  <button aria-label="toggle theme" class="px-4 py-3 text-white hover:bg-black dark:hover:bg-white dark:hover:text-black" id="switchTheme"></button>
</header>