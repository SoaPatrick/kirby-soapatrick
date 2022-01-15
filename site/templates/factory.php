<?php snippet('header') ?>
<header class="relative">
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(12); ?>
  <?php else: ?>
    <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed()->flip()->paginate(12) ?>
    <p class="text-lg"><?= $page->description() ?></p>
  <?php endif ?>
</header>
<div class="overview">
  <div class="tag-list tag-list--vertical">
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' text-blue-200 dark:text-egg-200') ?>" href="<?= url('factory', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
   </div>
  <div class="grid-factory">
  <?php foreach($articles as $article): ?>
    <article>
      <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>">
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
<?php snippet('subnavigation', ['subnav' => 'subnavfactory']) ?>
<?php snippet('footer') ?>
