<?php snippet('layouts/header') ?>
<header>
  <?php if (!empty(param('category'))): ?>
    <h1><?= html(urldecode(param('category'))) ?></h1>
    <?php $articles = $page->children()->filterBy('category', urldecode(param('category')), ',')->flip()->paginate(10); ?>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
    <?php $articles = $page->children()->listed()->flip()->paginate(10) ?>
  <?php endif ?>
</header>
<div class="content">
  <?php foreach($articles as $article): ?>
    <?php snippet('list-item/like', ['article' => $article]) ?>
  <?php endforeach ?>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('layouts/footer') ?>
