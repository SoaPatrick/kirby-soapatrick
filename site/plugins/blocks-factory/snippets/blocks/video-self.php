<figure class="video-block align-<?= $block->align() ?>">
  <video controls class="rounded-md">
    <source src="<?= $block->video()->toFile()->url(); ?>#t=0.001" type="video/mp4">
  </video>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>