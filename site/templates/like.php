<?php snippet('layouts/header') ?>
<article>
  <header class="mb-4">
    <?php snippet('published', ['article' => $page]); ?>
    <?php snippet('edit-page', ['page' => $page]); ?>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?php if($image = $page->cover()->toFile()): ?>
      <?php $img_resize = $image->resize(400); ?>
      <img class="block rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $page->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
    <?php endif ?>
  </div>
  <footer>
    <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
      <div class="text-xs opacity-70 mb-2">Tagged in</div>
      <div class="tag-list">
        <?php foreach ($page->category()->split() as $tag): ?>
          <a class="hashtag" href="<?= $page->parent()->url(['params' => ['category' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
        <?php endforeach ?>
      </div>
    </div>
  </footer>  
</article>

<?php snippet('pagination-single', ['page' => $page]) ?>
<?php snippet('layouts/footer') ?>