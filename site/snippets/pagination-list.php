<?php if ($articles->pagination()->hasPages()): ?>
  <nav class="pagination mt-8 inline-grid ml-auto w-full gap-4 font-serif grid-cols-2 max-w-content">
    <?php if ($articles->pagination()->hasNextPage()): ?>
      <a class="bold-link col-start-1 col-end-2 inline justify-self-start" href="<?= $articles->pagination()->nextPageURL() ?>">← older</a>
    <?php endif ?>
    <?php if ($articles->pagination()->hasPrevPage()): ?>
      <a class="bold-link col-start-2 col-end-3 inline justify-self-end" href="<?= $articles->pagination()->prevPageURL() ?>">newer →</a>
    <?php endif ?>
  </nav>
<?php endif ?>