<?php snippet('layouts/header') ?>
<header class="mt-4 mb-16">
  <?php if($image = $page->cover()->toFile()): ?>
    <img 
      srcset="<?= $image->srcset('cover-home'); ?>"
      class="text-center mx-auto rounded-full w-32"
      type="image/webp" 
      alt="<?= $image->alt() ?>"
      width="<?= $image->width() ?>" 
      height="<?= $image->height() ?>">
  <?php endif ?>
  <h1 class="relative text-center">
    Soa<span class="relative top-2">Patrick</span>
    <button type="button" id="feed-button" class="absolute feed-btn" data-copy="<?= url('feed.xml') ?>"><span class="hidden-text">RSS</span><span class="tooltip-text" id="feed-tooltip">Copy Feed URL</span></button>
  </h1>
  <div class="text-center text-lg"><?= $page->headline() ?></div>
</header>

<?php
  $boxItems = page('box')->children()->sortBy('published', 'desc')->listed()->limit(5);
  $factoryItems = page('factory')->children()->sortBy('published', 'desc')->listed()->limit(5);
  $labItems = page('lab')->children()->sortBy('published', 'desc')->listed()->limit(5);
  $likeItems = page('likes')->children()->sortBy('published', 'desc')->listed()->limit(5);
  $latestContent = new Collection();
  $latestContent->add($boxItems);
  $latestContent->add($factoryItems);
  $latestContent->add($labItems);
  $latestContent->add($likeItems);
?>

<div class="content content--articles">
  <?php foreach($latestContent->sortBy('published', 'desc')->limit(5) as $article): ?>
    <?php snippet('list-item/' . $article->intendedTemplate(), ['article' => $article]); ?>
  <?php endforeach ?>
</div>

<?php snippet('letterboxd') ?>
<?php snippet('layouts/footer'); ?>