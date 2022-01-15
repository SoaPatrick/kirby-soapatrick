<?php

/** @var \Kirby\Cms\Block $block */ 
$images   = $block->images()->toFiles();
$columns  = $block->columns();
$align    = $block->align();
$lightbox = $block->lightbox()->isTrue();

?>
<figure class="gallery-block gallery-block--<?= $columns ?>-columns align-<?= $align ?>">
  <?php foreach ($images as $image): ?>
    <?php if ($lightbox) {?>
      <a href="<?= $image->url() ?>" data-fslightbox aria-label="lightbox" class="img-link--lightbox">
        <img 
          srcset="<?= $image->srcset('img-' .$align ); ?>"
          type="image/webp" 
          alt="<?= $image->alt() ?>" 
          loading="lazy" 
          width="<?= $image->width() ?>" 
          height="<?= $image->height() ?>">
      </a>
    <?php } else { ?>
      <img 
        srcset="<?= $image->srcset('img-' .$align ); ?>" 
        type="image/webp" 
        alt="<?= $image->alt() ?>" 
        loading="lazy" 
        width="<?= $image->width() ?>" 
        height="<?= $image->height() ?>">
    <?php } ?>
  <?php endforeach ?>
</figure>