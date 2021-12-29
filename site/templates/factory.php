<?php snippet('header') ?>
<header class="relative">
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(12); ?>
  <?php else: ?>
    <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>    
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed()->flip()->paginate(12) ?>
    <p class="text-lg"><?= $page->description() ?></p>
  <?php endif ?>
  <div>
</header>
<div>
  <div>
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' text-black dark:text-white') ?>" href="<?= url('factory', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
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



<?php if ($articles->pagination()->hasPages()): ?>
<nav class="pagination">

  <?php if ($articles->pagination()->hasNextPage()): ?>
  <a class="next" href="<?= $articles->pagination()->nextPageURL() ?>">
    ← older
  </a>
  <?php endif ?>

  <?php if ($articles->pagination()->hasPrevPage()): ?>
  <a class="prev" href="<?= $articles->pagination()->prevPageURL() ?>">
    newer →
  </a>
  <?php endif ?>

</nav>
<?php endif ?>

<?php snippet('footer') ?>
