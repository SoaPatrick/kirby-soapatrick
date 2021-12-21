<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($video = video($block->url())): ?>
<figure class="video-block">
  <?= $video ?>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>