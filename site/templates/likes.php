<?php snippet('header') ?>
<header class="relative">
  <?php if (!empty(param('category'))): ?>
    <h1><?= html(urldecode(param('category'))) ?></h1>
    <?php $articles = $page->children()->filterBy('category', urldecode(param('category')), ',')->flip()->paginate(10); ?>
  <?php else: ?>
    <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed()->flip()->paginate(10) ?>
    <p class="text-lg"><?= $page->description() ?></p>
  <?php endif ?>
</header>
<div class="content">
  <?php foreach($articles as $article): ?>
    <?php snippet('list-item/like', ['article' => $article]) ?>
  <?php endforeach ?>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('subnavigation', ['subnav' => 'subnavpatrick']) ?>
<?php snippet('footer') ?>
