<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>

<article>
  <header class="relative">
    <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
      <?= $page->icon(); ?>
    </div>
    <div>
      <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $page->modified(DATE_ATOM) ?>">
        <?= $page->modified('F j, Y') ?>
      </time>
    </div>
    <h1 class="mt-0"><?= $page->title() ?></h1>
  </header>
  <div>
    <?= markdown($page->text()) ?>
  </div>
</article>
<?php snippet('footer') ?>
