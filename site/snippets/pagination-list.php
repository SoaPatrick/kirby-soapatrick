<?php if ($articles->pagination()->hasPages()): ?>
  <nav class="pagination">
    <?php if ($articles->pagination()->hasNextPage()): ?>
      <a class="prev" href="<?= $articles->pagination()->nextPageURL() ?>">← older</a>
    <?php endif ?>
    <?php if ($articles->pagination()->hasPrevPage()): ?>
      <a class="next" href="<?= $articles->pagination()->prevPageURL() ?>">newer →</a>
    <?php endif ?>
  </nav>
<?php endif ?>