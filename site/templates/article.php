<?php snippet('layouts/header') ?>
<article>
  <header class="mb-4">
    <?php snippet('cover', ['article' => $page]) ?>
    <?php snippet('published', ['article' => $page]); ?>
    <?php snippet('edit-page', ['page' => $page]); ?>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?php foreach ($page->text()->toBlocks() as $block): ?>
      <?= $block ?>
    <?php endforeach ?>
  </div>
  <footer class="article__footer">
    <div class="text-xs opacity-70 mb-2">Tagged in</div>
    <div class="tag-list">
      <?php foreach ($page->tags()->split() as $tag): ?>
        <a class="hashtag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>

<?php snippet('pagination-single', ['page' => $page]) ?>
<?php snippet('layouts/subnavigation', ['subnav' => 'subnavbox']) ?>
<?php snippet('layouts/footer') ?>