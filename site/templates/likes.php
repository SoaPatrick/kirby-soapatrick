<?php snippet('layouts/header') ?>
<header>
  <?php if (!empty(param('category'))): ?>
    <h1><?= html(urldecode(param('category'))) ?></h1>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
  <?php endif ?>
</header>
<div class="content grid gap-4">
  <?php if (empty(param('category'))): ?>
    <?php
      $group = $page
        ->children()->listed()
        ->sort(function($child) {
          return $child->category()->text();
        })
        ->group(function($child) {
          return $child->category()->text();
        });
      foreach($group as $cat => $articles): 
    ?>
      <div class="flex flex-col-reverse">
        <div class="grid grid-cols-2 sm:grid-cols-4 gap-4">
          <?php foreach($articles->limit(4) as $article) : ?>
            <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>" class="img-link">
              <?php if($image = $article->cover()->toFile()): ?>
                <img 
                  srcset="<?= $image->srcset('cover-default-' .$image->extension()); ?>"
                  class="rounded-md object-cover h-full"
                  type="image/webp" 
                  alt="<?= $article->title()->html() ?>"
                  width="<?= $image->width() ?>" 
                  height="<?= $image->height() ?>">
              <?php endif ?>
            </a>
          <?php endforeach; ?>
        </div>
        <h2 class="mb-2 mt-4">
          <a class="more" href="<?= $article->parent()->url(['params' => ['category' => urlencode($article->category())]]) ?>"><?= html($article->category()) ?></a>
        </h2>

      </div>
    <?php endforeach; ?>
  <?php else: ?>
    <?php $articles = $page->children()->filterBy('category', urldecode(param('category')), ',')->flip()->paginate(24); ?>
    <div class="grid grid-cols-2 sm:grid-cols-4 gap-4 mb-2">
      <?php foreach($articles as $article) : ?>
        <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>" class="img-link">
          <?php if($image = $article->cover()->toFile()): ?>
            <img 
              srcset="<?= $image->srcset('cover-default-' .$image->extension()); ?>"
              class="rounded-md object-cover h-full"
              type="image/webp" 
              alt="<?= $article->title()->html() ?>"
              width="<?= $image->width() ?>" 
              height="<?= $image->height() ?>">
          <?php endif ?>
        </a>
      <?php endforeach; ?>
    </div>
  <?php endif ?>
</div>
<?php if (!empty(param('category'))): ?>
  <?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php endif ?>
<?php snippet('layouts/footer') ?>
