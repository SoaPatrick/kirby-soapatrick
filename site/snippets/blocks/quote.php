<?php

/** @var \Kirby\Cms\Block $block */ 
?>
<blockquote class="quote-block quote-block--<?= $block->style() ?>">
  <p>
    <?= $block->text() ?>
  </p>
  <?php if ($block->citation()->isNotEmpty()): ?>
    <cite>
      <?= $block->citation() ?>
    </cite>
  <?php endif ?>
</blockquote>