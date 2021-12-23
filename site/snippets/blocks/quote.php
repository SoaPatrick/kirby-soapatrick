<?php

/** @var \Kirby\Cms\Block $block */ 
?>
<figure class="quote-block quote-block--<?= $block->style() ?>">
  <blockquote>
    <p>
      <?= $block->text() ?>
    </p>
  </blockquote>
  <?php if ($block->citation()->isNotEmpty()): ?>
    <figcaption>
      <?= $block->citation() ?>
    </figcaption>
  <?php endif ?>
</figure>