<?php snippet('header') ?>
<header class="relative">
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ','); ?>
  <?php else: ?>
    <div class="marginal-icon absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>    
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed() ?>
    <p><?= $page->description() ?></p>
  <?php endif ?>
  <div>
</header>
<div>
  <div>
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="tag<?= e(param('tag') == urlencode($tag), ' text-black dark:text-white') ?>" href="<?= url('factory', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
   </div>
  <div class="grid-factory">
  <?php foreach($articles as $article): ?>
    <article>
      <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>">
        <?php if($image = $article->cover()->toFile()): ?>
          <?php $img_resize = $image->resize(250); ?>
          <img class="block w-full h-full object-cover rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $article->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
        <?php endif ?>
      </a>
    </article>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('footer') ?>
