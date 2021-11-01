<?php snippet('header') ?>
<?php snippet('breadcrumb') ?>

<header class="relative">
  <?php if (!empty(param('tag'))): ?>
    <h1><?= html(urldecode(param('tag'))) ?></h1>
    <?php $articles = $page->children()->filterBy('tags', urldecode(param('tag')), ',')->paginate(10); ?>
  <?php else: ?>
    <div class="marginal-icon absolute grid place-items-center">
        <?= $page->icon(); ?>
    </div>    
    <h1><?= $page->title() ?></h1>
    <?php $articles = $page->children()->listed()->paginate(10) ?>
    <p><?= $page->description() ?></p>
  <?php endif ?>
  <div>
</header>
<div>
  <?php foreach($articles as $article): ?>

  <article>
    <h2><a href="<?= $article->url() ?>"><?= $article->title()->html() ?></a></h2>
    <footer>
      <div>
        <?php foreach ($article->tags()->split() as $tag): ?>
          <a class="tag" href="<?= $article->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
        <?php endforeach ?>
      </div>
    </footer>
  </article>

  <?php endforeach ?>
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
