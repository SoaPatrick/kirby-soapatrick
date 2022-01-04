<?php

/** @var \Kirby\Cms\Block $block */
$alt      = $block->alt();
$caption  = $block->caption();
$crop     = $block->crop()->isTrue();
$link     = $block->link();
$ratio    = $block->ratio()->or('auto');
$src      = null;
$lightbox = $block->lightbox()->isTrue();
$align    = $block->align();
$id       = $block->id();

if ($block->location() == 'web') {
    $src = $block->src()->esc();
    $dimensions = '';
} elseif ($image = $block->image()->toFile()) {
    if ($alt->isEmpty()) {
      $alt = $image->alt();
    }
    if ($caption->isEmpty()) {
      $caption = $image->caption();
    }
    $src = $image->url();
    $dimensions = 'width="'.$image->width().'" height="'.$image->height().'"';
}

?>
<?php if ($src): ?>
<figure class="image-block align-<?= $align ?>" <?= attr(['data-ratio' => $ratio, 'data-crop' => $crop], ' ') ?>>
  <?php if ($link->isNotEmpty()): ?>
  <a href="<?= esc($link->toUrl()) ?>">
    <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy">
  </a>
  <?php elseif($lightbox): ?>
  <a href="<?= $src ?>" data-fslightbox="<?= $id ?>">
    <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy" <?= $dimensions ?>>
  </a>
  <?php else: ?>
  <img src="<?= $src ?>" alt="<?= $alt->esc() ?>" loading="lazy" <?= $dimensions ?>>
  <?php endif ?>

  <?php if ($caption->isNotEmpty()): ?>
  <figcaption>
    <?= $caption->kt() ?>
  </figcaption>
  <?php endif ?>
</figure>
<?php endif ?>