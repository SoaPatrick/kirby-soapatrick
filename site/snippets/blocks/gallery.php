<?php

/** @var \Kirby\Cms\Block $block */ 
$images       = $block->images()->toFiles();
$columns      = $block->columns();
$align        = $block->align();
$is_lightbox  = $block->lightbox()->isTrue();

$gallery_id   = mt_rand(1,1000);

?>
<figure class="gallery-block gallery-block--<?= $columns ?>-columns align-<?= $align ?> flex flex-wrap gap-4 my-8">
  <?php foreach ($images as $image): ?>
    <?php if ($is_lightbox) {?>
      <a href="<?= $image->thumb('lightbox-' .$image->extension())->url() ?>" data-fslightbox="<?= $gallery_id ?>" aria-label="lightbox" class="flex grow flex-col justify-center relative img-link img-link--lightbox">
        <img 
          srcset="<?= $image->srcset('img-' .$align. '-' .$image->extension() ); ?>"
          type="image/webp"
          <?php if ($image->alt()->isEmpty()): ?>
            alt="empty alt text" 
          <?php else: ?>
            alt="<?= $image->alt() ?>" 
          <?php endif ?>
          loading="lazy" 
          class="rounded-md object-cover h-full"
          width="<?= $image->width() ?>" 
          height="<?= $image->height() ?>">
      </a>
    <?php } else { ?>
      <img 
        srcset="<?= $image->srcset('img-' .$align. '-' .$image->extension() ); ?>" 
        type="image/webp"
        <?php if ($image->alt()->isEmpty()): ?>
          alt="empty alt text" 
        <?php else: ?>
          alt="<?= $image->alt() ?>" 
        <?php endif ?>
        class="flex grow flex-col justify-center relative rounded-md object-cover"
        loading="lazy" 
        width="<?= $image->width() ?>" 
        height="<?= $image->height() ?>">
    <?php } ?>
  <?php endforeach ?>
</figure>