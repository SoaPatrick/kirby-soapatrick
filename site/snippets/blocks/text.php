<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($block->highlight()->toBool() === true): ?>
  <div class="highlight bg-primary text-egg-200 py-8 my-8 rounded-md text-2xl">
    <?= $block->text(); ?>
  </div>
  <?php else: ?>
  <?= $block->text(); ?>
<?php endif ?>