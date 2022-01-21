<?php snippet('layouts/header') ?>
<header>
  <h1><?= $page->title() ?></h1>
  <p class="text-lg"><?= $page->description() ?></p>
</header>
<div class="content">
  <?php
    $callback = function($p) {
      return $p->published()->toDate('F j, Y');
    };
    $articles = $page->children()->listed()->flip()->paginate(20);
    $groups = $articles->group($callback);
    foreach($groups as $day => $list): ?>
      <div class="text-xs uppercase tracking-wide opacity-70 mb-2"><?= $day ?></div>
      <ul class="list-none mb-12 pl-6 leading-6">
        <?php foreach($list as $article) : ?>
          <li class="relative"><?php snippet('log-icon', ['icon' => $article->type()]) ?><strong class="capitalize"><?= $article->type() ?></strong> <?= $article->title() ?></li>
        <?php endforeach; ?>
      </ul>
    <?php endforeach ?>
</div>

<?php if ($articles->pagination()->hasPages()): ?>
  <nav class="pagination mt-8 inline-grid ml-auto w-full gap-4 font-serif grid-cols-2 max-w-content">
    <?php if ($articles->pagination()->hasNextPage()): ?>
      <a class="bold-link col-start-1 col-end-2 inline justify-self-start" href="<?= $articles->pagination()->nextPageURL() ?>">← older</a>
    <?php endif ?>
    <?php if ($articles->pagination()->hasPrevPage()): ?>
      <a class="bold-link col-start-2 col-end-3 inline justify-self-end" href="<?= $articles->pagination()->prevPageURL() ?>">newer →</a>
    <?php endif ?>
  </nav>
<?php endif ?>

<?php snippet('layouts/footer') ?>