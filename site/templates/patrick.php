<?php snippet('layouts/header') ?>
<article>
  <header>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?= markdown($page->text()->kt()) ?>
  </div>
  <footer>
    <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
      <div class="text-xs opacity-70 mb-2">Modified on</div>
        <time class="text-xs flex" datetime="<?= $page->modified(DATE_ATOM) ?>">
          <?= $page->modified('F j, Y') ?>
        </time>
    </div>
  </footer>
</article>

<?php snippet('layouts/footer') ?>
