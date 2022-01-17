<?php snippet('layouts/header') ?>
<header>
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(24); ?>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
    <?php $articles = $page->children()->listed()->flip()->paginate(24) ?>
  <?php endif ?>
</header>
<div class="overview">
  <div class="tag-list tag-list--vertical">
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' active') ?>" href="<?= url('lab', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
  </div>
  <div class="grid-lab">
    <?php foreach($articles as $article): ?>
      <?php if($image = $article->cover()->toFile()): ?>
        <article>
          <?php if($article->format() == 'video'): ?>
            <a href="<?= $article->video()->toFile()->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox video-link">
          <?php else: ?>
            <a href="<?= $image->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox class="img-link img-link--lightbox">
          <?php endif ?>
            <img 
              srcset="<?= $image->srcset('cover-factory-' .$image->extension()); ?>"
              class="block w-full h-full object-cover rounded-md"
              type="image/webp" 
              alt="<?= $article->title()->html() ?>" 
              width="<?= $image->width() ?>" 
              height="<?= $image->height() ?>">
          </a>
        </article>
      <?php endif ?>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('layouts/footer') ?>
