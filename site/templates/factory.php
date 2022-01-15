<?php snippet('layouts/header') ?>
<header>
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(12); ?>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
    <?php $articles = $page->children()->listed()->flip()->paginate(12) ?>
  <?php endif ?>
</header>
<div class="overview">
  <div class="tag-list tag-list--vertical">
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' active') ?>" href="<?= url('factory', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
   </div>
  <div class="grid-factory">
  <?php foreach($articles as $article): ?>
    <article>
      <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>" class="img-link">
        <?php if($image = $article->cover()->toFile()): ?>
          <img 
            srcset="<?= $image->srcset('cover-factory'); ?>"
            class="rounded-md"
            type="image/webp" 
            alt="<?= $image->alt() ?>"
            width="<?= $image->width() ?>" 
            height="<?= $image->height() ?>">
        <?php endif ?>
      </a>
    </article>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('layouts/subnavigation', ['subnav' => 'subnavfactory']) ?>
<?php snippet('layouts/footer') ?>
