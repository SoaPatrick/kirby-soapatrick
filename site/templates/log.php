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
  <nav class="pagination">
    <?php if ($articles->pagination()->hasNextPage()): ?>
      <a class="older" href="<?= $articles->pagination()->nextPageURL() ?>">← older</a>
    <?php endif ?>
    <?php if ($articles->pagination()->hasPrevPage()): ?>
      <a class="newer" href="<?= $articles->pagination()->prevPageURL() ?>">newer →</a>
    <?php endif ?>
  </nav>
<?php endif ?>

<?php snippet('layouts/footer') ?>