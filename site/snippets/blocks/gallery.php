<?php /** @var \Kirby\Cms\Block $block */ ?>
<figure class="gallery-block gallery-block--<?= $block->columns() ?>-columns align-<?= $block->align() ?>">
  <?php foreach ($block->images()->toFiles() as $image): ?>
    <?php if ($block->lightbox()->toBool() === true) {?>
      <a href="<?= $image->url() ?>" data-fslightbox="<?= $block->_uid() ?>">
        <?= $image ?>
      </a>
    <?php } else { ?>
      <?= $image ?>
    <?php } ?>
  <?php endforeach ?>
</figure>