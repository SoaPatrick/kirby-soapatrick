<?php

/** @var \Kirby\Cms\Block $block */ 
?>
<figure class="gallery-block gallery-block--<?= $block->columns() ?>-columns align-<?= $block->align() ?>">
  <?php foreach ($block->images()->toFiles() as $image): ?>
    <?php if ($block->lightbox()->toBool() === true) {?>
      <a href="<?= $image->url() ?>" data-fslightbox="">
        <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
      </a>
    <?php } else { ?>
      <img src="<?= $image->url() ?>" alt="<?= $image->alt() ?>" loading="lazy" width="<?= $image->width() ?>" height="<?= $image->height() ?>">
    <?php } ?>
  <?php endforeach ?>
</figure>