<?php

/** @var \Kirby\Cms\Block $block */
$image        = $block->image()->toFile();
$alt          = $block->alt();
$caption      = $block->caption();
$crop         = $block->crop()->isTrue();
$link         = $block->link();
$ratio        = $block->ratio()->or('auto');
$is_lightbox  = $block->lightbox()->isTrue();
$shadow       = $block->shadow()->isTrue();
$align        = $block->align();
$id           = $block->id();

$src          = $image->url();
$extension    = $image->extension();
$lightbox     = $image->thumb('lightbox-' .$extension)->url();
$width        = $image->width();
$height       = $image->height();

if ($shadow) {
  $alignClass = ' max-w-content mr-0 my-12';
  $imgShadow = ' drop-shadow-[0_0.5rem_1rem_rgba(0,0,0,0.4)]';
} else {
  $alignClass = ' align-'.$align;
  $imgShadow = null;
}

if ($alt->isEmpty()) {
  $alt = $image->alt();
}
if ($alt->isEmpty()) {
  $alt = "empty alt text";
}
if ($caption->isEmpty()) {
  $caption = $image->caption();
}

?>
<?php if ($src): ?>
  <figure class="image-block my-8 <?= $alignClass ?>" <?= attr(['data-ratio' => $ratio, 'data-crop' => $crop], ' ') ?>>
    <?php if ($link->isNotEmpty()): ?>
      <a href="<?= esc($link->toUrl()) ?>" aria-label="<?= $alt ?>" class="img-link img-link--external" target="_blank" rel="noopener noreferrer">
    <?php elseif($is_lightbox): ?>
      <a href="<?= $lightbox ?>" aria-label="lightbox <?= $alt ?>" class="img-link img-link--lightbox" data-fslightbox="<?= $id ?>">
    <?php endif ?>
        <img 
          srcset="<?= $image->srcset('img-' .$align. '-' .$extension ); ?>"
          type="image/webp" 
          alt="<?= $alt ?>" 
          width="<?= $width ?>" 
          height="<?= $height ?>" 
          loading="lazy"
          class="rounded-md mx-auto<?= $imgShadow ?>">
    <?php if ($link->isNotEmpty() || $is_lightbox) : ?>
      </a>
    <?php endif ?> 

    <?php if ($caption->isNotEmpty()): ?>
      <figcaption>
        <?= $caption->kt() ?>
      </figcaption>
    <?php endif ?>
  </figure>
<?php endif ?>