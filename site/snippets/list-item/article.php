<article>
  <header class="mb-2">
    <?php snippet('featured-img', ['article' => $article]) ?>
    <time class="text-xs uppercase tracking-wide opacity-70" datetime="<?= $article->published()->toDate(DATE_ATOM) ?>">
      <?= $article->published()->toDate('F j, Y') ?>
    </time>
    <?php if ($article->format() == "quote"): ?>
      <blockquote class="text-2xl mt-1 mb-4">
        <?= $article->quotetext() ?>
        <cite><?= $article->quotesource() ?></cite>
      </blockquote>
    <?php elseif ($article->format() == "status"): ?>
      <div class="text-2xl"><?= $article->statustext() ?></div>
    <?php else: ?>
      <a class="decoration-transparent hover:decoration-current" href="<?= $article->url() ?>">
        <h2 class="mt-0 mb-1"><?= $article->title() ?></h2>
      </a>
    <?php endif ?>
  </header>
  <?php if ($article->format() == "standard"): ?>
    <div class="content">
      <p class="my-4">
        <?= $article->text()->toBlocks()->excerpt(200) ?> <a href="<?= $article->url() ?>" class="more">more →</a>
      </p>
    </div>
  <?php endif ?>
  <footer class="bg-egg-100 dark:bg-blue-100 inline-block rounded-md py-1 px-2">
    <div class="tag-list">
      <?php foreach ($article->tags()->split() as $tag): ?>
        <a class="hashtag" href="<?= $article->parent()->url(['params' => ['tag' => urlencode($tag)]]) ?>"><?= html($tag) ?></a>
      <?php endforeach ?>
    </div>
  </footer>
</article>