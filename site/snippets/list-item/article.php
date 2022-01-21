<article>
  <header class="mb-2">
    <?php snippet('cover', ['article' => $article]) ?>
    <?php snippet('published', ['article' => $article]); ?>
    <?php snippet('edit-page', ['page' => $article]); ?>
    <?php if ($article->format() == "quote"): ?>
      <blockquote class="quote-block quote-block--list">
        <?= $article->quotetext() ?>
        <cite><?= $article->quotesource() ?></cite>
      </blockquote>
    <?php elseif ($article->format() == "status"): ?>
      <div class="text-2xl content"><?= $article->statustext() ?></div>
    <?php elseif ($article->format() == "link"): ?>
      <div class="content">
        <div class="text-2xl"><?= $article->linktext() ?></div>
        <a href="<?= $article->linkurl() ?>" target="_blank" rel="noopener noreferrer" class="font-sans font-normal decoration-current hover:decoration-transparent mb-4 inline-block"><?= $article->linkurl() ?></a>
      </div>
    <?php else: ?>
      <h2 class="mt-0 mb-1">
        <a class="bold-link" href="<?= $article->url() ?>"><?= $article->title() ?></a>
      </h2>
    <?php endif ?>
  </header>
  <?php if ($article->format() == "standard"): ?>
    <div>
      <p class="my-4">
        <?= $article->text()->toBlocks()->excerpt(200) ?> <a href="<?= $article->url() ?>" class="bold-link">more →</a>
      </p>
    </div>
  <?php endif ?>
  <footer class="bg-egg-100 dark:bg-blue-100 inline-block rounded-md py-1 px-2">
    <div class="tag-list">
      <?php $tags = $article->tags()->split(); ?>
      <?php sort($tags); ?>
      <?php foreach ($tags as $tag): ?>
        <a class="hashtag" href="<?= $article->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>