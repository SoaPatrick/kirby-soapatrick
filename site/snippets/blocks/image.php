<?php

/** @var \Kirby\Cms\Block $block */
$alt      = $block->alt();
$caption  = $block->caption();
$crop     = $block->crop()->isTrue();
$link     = $block->link();
$ratio    = $block->ratio()->or('auto');
$src      = null;
$lightbox = $block->lightbox()->isTrue();
$id       = $block->_uid();

if ($block->location() == 'web') {
    $src = $block->src()->esc();
} elseif ($image = $block->image()->toFile()) {
    $alt = $alt ?? $image->alt();
    $src = $image->url();
}

?>
<?php if ($src): ?>
<figure class="image-block" <?= attr(['data-ratio' => $ratio, 'data-crop' => $crop], ' ') ?>>
  <?php if ($link->isNotEmpty()): ?>
  <a href="<?= esc($link->toUrl()) ?>">
    <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
  </a>
  <?php elseif($lightbox): ?>
  <a href="<?= $src ?>" data-fslightbox="<?= $id ?>">
    <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
  </a>
  <?php else: ?>
  <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
  <?php endif ?>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <?= $caption ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>