<time class="text-xs uppercase tracking-wide opacity-70 " datetime="<?= $article->published()->toDate(DATE_ATOM) ?>">
  <?= $article->published()->toDate('F j, Y') ?>
</time>