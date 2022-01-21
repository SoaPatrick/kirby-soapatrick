<nav class="pagination mt-8 inline-grid ml-auto w-full gap-4 font-serif grid-cols-2 max-w-content">
  <?php if ($page->hasPrevListed()): ?>
    <a class="bold-link col-start-1 col-end-2 inline justify-self-start" href="<?= $page->prevListed()->url() ?>">← older</a>
  <?php endif ?>
  <?php if ($page->hasNextListed()): ?>
    <a class="bold-link col-start-2 col-end-3 inline justify-self-end" href="<?= $page->nextListed()->url() ?>">newer →</a>
  <?php endif ?>
</nav>