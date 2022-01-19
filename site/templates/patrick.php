<?php snippet('layouts/header') ?>
<article>
  <header>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?= markdown($page->text()->kt()) ?>
  </div>
  <footer class="article__footer">
    <div class="text-[0.6rem] mb-1 uppercase font-bold tracking-wider">Modified on:</div>
    <time class="text-xs flex" datetime="<?= $page->modified(DATE_ATOM) ?>">
      <?= $page->modified('F j, Y') ?>
    </time>
  </footer>
</article>

<?php snippet('layouts/footer') ?>
