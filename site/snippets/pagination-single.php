<nav class="pagination">
  <?php if ($page->hasPrevListed()): ?>
    <a class="prev" href="<?= $page->prevListed()->url() ?>">← older</a>
  <?php endif ?>
  <?php if ($page->hasNextListed()): ?>
    <a class="next" href="<?= $page->nextListed()->url() ?>">newer →</a>
  <?php endif ?>
</nav>