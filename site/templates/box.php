<?php snippet('layouts/header') ?>
<header>
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(10); ?>
  <?php elseif (!empty(param('storage'))): ?>
    <h1><?= html(urldecode(param('storage'))) ?></h1>
    <?php 
      $date = explode(" ", html(urldecode(param('storage'))));
      $articles = page('box')
        ->children()
        ->filter(function ($page) use ($date) {
          return $page->published()->toDate('Y') === $date[1] && $page->published()->toDate('F') === $date[0];
        })->flip()->paginate(10);
    ?>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
    <?php $articles = $page->children()->listed()->flip()->paginate(10) ?>
  <?php endif ?>
</header>
<div class="content--articles">
  <?php foreach($articles as $article): ?>
    <?php snippet('list-item/article', ['article' => $article]) ?>
  <?php endforeach ?>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('layouts/footer') ?>
