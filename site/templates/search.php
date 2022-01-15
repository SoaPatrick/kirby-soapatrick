<?php
  $query = get('q');
  $boxItems = page('box')->children();
  $factoryItems = page('factory')->children();
  $labItems = page('lab')->children();
  $likes = page('likes')->children();
  $patrick = page('patrick');
  $content = new Collection();
  $content->add($boxItems);
  $content->add($factoryItems);
  $content->add($labItems);
  $content->add($likes);
  $content->add($patrick);
  $articles = $content->search($query, 'title|text|tags')->paginate(10);
?>

<?php snippet('layouts/header'); ?>

<?php if($articles->isNotEmpty()): ?>
  <header class="mb-16">
    <h1><?= $page->title() ?>: <?= $query ?></h1>
  </header>
  <div class="content content--articles">
    <?php foreach($articles as $article): ?>
        <?php snippet('list-item/' . $article->intendedTemplate(), ['article' => $article]); ?>
    <?php endforeach ?>
  </div>
  <?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php else: ?>
  <header class="mb-16">
    <h1><?= $page->title() ?>: <?= $query ?></h1>
  </header>
<?php endif ?>

<?php snippet('layouts/footer'); ?>