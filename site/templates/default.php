<?php snippet('header') ?>
<article>
  <header class="relative">
    <div class="marginal-icon absolute grid place-items-center">
      <?= $page->icon(); ?>
    </div>
    <div>
      <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->modified(DATE_ATOM) ?>">
        <?= $page->modified('F j, Y') ?>
      </time>
    </div>
    <h1><?= $page->title() ?></h1>
  </header>
  <div>
    <?= markdown($page->text()) ?>
  </div>
</article>
<?php snippet('footer') ?>
