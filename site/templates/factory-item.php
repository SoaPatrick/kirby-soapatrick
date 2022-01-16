<?php snippet('layouts/header') ?>
<article>
  <header class="mb-4">
    <?php snippet('published', ['article' => $page]); ?>
    <?php snippet('edit-page', ['page' => $page]); ?>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <?php foreach ($page->text()->toBlocks() as $block): ?>
      <?= $block ?>
    <?php endforeach ?>
  </div>
  <footer>
    <div class="bg-egg-100 dark:bg-blue-100 rounded-md p-4 mt-8">
      <div class="text-xs opacity-70 mb-2">Tagged in</div>
      <div class="tag-list">
        <?php foreach ($page->tags()->split() as $tag): ?>
          <a class="hashtag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
        <?php endforeach ?>
      </div>
    </div>
  </footer>
</article>


<?php snippet('pagination-single', ['page' => $page]) ?>

<section class="content mt-16">
  <?php $labs = page('lab')->children()->filterBy('project', $page->uri(), ',')->flip(); ?>
  <?php $articles = page('box')->children()->filterBy('project', $page->uri(), ',')->flip(); ?>

  <?php if ($labs->isNotEmpty()): ?>
    <div class="grid-lab mb-16">
      <?php foreach($labs as $article): ?>
        <?php if($image = $article->cover()->toFile()): ?>
          <article>
            <?php if($article->format() == 'video'): ?>
              <a href="<?= $article->video()->toFile()->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox video-link">
            <?php else: ?>
              <a href="<?= $image->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox">
            <?php endif ?>
              <?php $img_resize = $image->resize(390); ?>
              <img class="block w-full h-full object-cover rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $article->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
            </a>
          </article>
        <?php endif ?>
      <?php endforeach ?>
    </div>
  <?php endif ?>

  <?php if ($articles->isNotEmpty()): ?>
    <div class="flex flex-col gap-16">
      <?php foreach($articles as $article): ?>
        <?php snippet('list-item/article-compact', ['article' => $article]) ?>
      <?php endforeach ?>
    </div>
  <?php endif ?>
</section>

<?php snippet('layouts/subnavigation', ['subnav' => 'subnavfactory']) ?>
<?php snippet('layouts/footer') ?>