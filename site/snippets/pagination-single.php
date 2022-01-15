<nav class="pagination">
  <?php if ($page->hasPrevListed()): ?>
    <a class="older" href="<?= $page->prevListed()->url() ?>">← older</a>
  <?php endif ?>
  <?php if ($page->hasNextListed()): ?>
    <a class="newer" href="<?= $page->nextListed()->url() ?>">newer →</a>
  <?php endif ?>
</nav>