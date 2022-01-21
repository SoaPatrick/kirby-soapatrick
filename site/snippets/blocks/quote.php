<?php

/** @var \Kirby\Cms\Block $block */ 

$class = null;
$style = $block->style();

if($style == 'large') {
  $class = ' align-default';
}

?>
<blockquote class="quote-block quote-block--<?= $block->style() ?><?= $class ?>">
  <p>
    <?= $block->text() ?>
  </p>
  <?php if ($block->citation()->isNotEmpty()): ?>
    <cite>
      <?= $block->citation() ?>
    </cite>
  <?php endif ?>
</blockquote>