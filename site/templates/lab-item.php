<?php snippet('layouts/header') ?>
<article>
  <header class="mb-4">
    <?php snippet('published', ['article' => $page]); ?>
    <?php snippet('edit-page', ['page' => $page]); ?>
    <h1><?= $page->title() ?></h1>
  </header>
  <div class="content">
    <figure class="my-4 align-default">
      <?php if($image = $page->cover()->toFile()): ?>
        <?php if($page->format() == 'video'): ?>
          <a href="<?= $page->video()->toFile()->url() ?>" aria-label="<?= $page->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox video-link">
        <?php else: ?>
          <a href="<?= $image->thumb('lightbox-' .$image->extension())->url() ?>" aria-label="<?= $page->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox">
        <?php endif ?>
          <img 
            class="block w-full h-full object-cover rounded-md" 
            srcset="<?= $image->srcset('img-default-' .$image->extension()); ?>"
            loading="lazy" 
            alt="<?= $page->title()->html() ?>" 
            width="<?= $image->width() ?>" 
            height="<?= $image->height() ?>
          ">
          </a>
      <?php endif ?>
      <figcaption>
        <?= $page->cover()->toFile()->caption() ?>
      </figcaption>
    </figure>
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

<?php snippet('layouts/footer') ?>