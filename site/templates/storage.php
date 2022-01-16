<?php snippet('layouts/header') ?>

<header>
  <h1><?= $page->title() ?></h1>
</header>
<div class="content">
  <?php 
    $posts = page('box')->children()->listed();
    $tags = page('box')->children()->listed()->pluck('tags', ',', true); 
    $tags = new Collection($tags);
    $tags = $tags->sortBy('name', 'desc')
  ?>
  <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
    <div class="text-xs opacity-70 mb-2">Tag-Cloud</div>
    <div class="tag-list">
      <?php foreach($tags as $tag): ?>
        <a class="hashtag" href="<?= url(page('box')->url(), ['params' => ['tag' => $tag]]) ?>">
          <?= html($tag) ?> <span class="text-xs text-cyan-35 dark:text-cyan-62">(<?= $posts->filterBy('tags', $tag, ',')->count() ?>)</span>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</div>

<?php snippet('layouts/footer') ?>