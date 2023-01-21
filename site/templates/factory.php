<?php snippet('layouts/header',['entry' => 'factory']) ?>
<header>
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->listed()->flip()->paginate(12); ?>
  <?php else: ?>
    <h1><?= $page->title() ?></h1>
    <p class="text-lg"><?= $page->description() ?></p>
    <?php $articles = $page->children()->listed()->flip()->paginate(12) ?>
  <?php endif ?>
</header>
<div class="grid gap-gutter items-start max-w-content sm:max-w-widest w-full ml-auto sm:grid-cols-[1fr_var(--width--content)]">
  <div class="tag-list tag-list--vertical">
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' active') ?>" href="<?= url('factory', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
   </div>
  <div class="grid-factory">
  <?php foreach($articles as $article): ?>
    <article class="block">
      <a href="<?= $article->url() ?>" aria-label="<?= $article->title()->html() ?>" class="img-link">
        <?php if($image = $article->cover()->toFile()): ?>
          <img 
            srcset="<?= $image->srcset('cover-default-' .$image->extension()); ?>"
            class="rounded-md block"
            type="image/webp" 
            alt="<?= $article->title()->html() ?>"
            width="<?= $image->width() ?>" 
            height="<?= $image->height() ?>">
        <?php endif ?>
      </a>
    </article>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('layouts/footer',['entry' => 'factory']) ?>
