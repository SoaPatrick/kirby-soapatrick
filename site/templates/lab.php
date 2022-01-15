<?php snippet('header') ?>
<header class="relative">
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->flip()->paginate(24); ?>
  <?php else: ?>
    <div class="marginal-icon marginal-icon--large mb-2 sm:mb-0 sm:absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed()->flip()->paginate(24) ?>
    <p><?= $page->description() ?></p>
  <?php endif ?>
</header>
<div class="overview">
  <div class="tag-list tag-list--vertical">
    <?php foreach( $page->children()->listed()->pluck('tags', ',', true) as $tag): ?>
      <a class="hashtag<?= e(param('tag') == urlencode($tag), ' text-blue-200 dark:text-egg-200') ?>" href="<?= url('lab', ['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
    <?php endforeach ?>
  </div>
  <div class="grid-lab">
    <?php foreach($articles as $article): ?>
      <?php if($image = $article->cover()->toFile()): ?>
        <article>
          <?php if($article->format() == 'video'): ?>
            <a href="<?= $article->video()->toFile()->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox>
          <?php else: ?>
            <a href="<?= $image->url() ?>" aria-label="<?= $article->title()->html() ?>" data-fslightbox>
          <?php endif ?>
            <?php $img_resize = $image->resize(390); ?>
            <img class="block w-full h-full object-cover rounded-md" src="<?= $img_resize->url() ?>" loading="lazy" alt="<?= $article->title()->html() ?>" width="<?= $img_resize->width() ?>" height="<?= $img_resize->height() ?>">
          </a>
        </article>
      <?php endif ?>
    <?php endforeach ?>
  </div>
</div>

<?php snippet('pagination-list', ['articles' => $articles]) ?>
<?php snippet('subnavigation', ['subnav' => 'subnavfactory']) ?>
<?php snippet('footer') ?>
