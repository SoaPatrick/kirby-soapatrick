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
  <footer class="article__footer">
    <div class="text-[0.6rem] mb-1 uppercase font-bold tracking-wider">Tagged in:</div>
    <div class="tag-list">
      <?php $tags = $page->tags()->split(); ?>
      <?php sort($tags); ?>
      <?php foreach ($tags as $tag): ?>
        <a class="hashtag" href="<?= $page->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
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
              <a href="<?= $image->thumb('lightbox-' .$image->extension())->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox">
            <?php endif ?>
              <img 
                class="block w-full h-full object-cover rounded-md" 
                srcset="<?= $image->srcset('cover-default-' .$image->extension()); ?>"
                loading="lazy" 
                alt="<?= $article->title()->html() ?>" 
                width="<?= $image->width() ?>" 
                height="<?= $image->height() ?>
              ">
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

<?php snippet('layouts/footer') ?>