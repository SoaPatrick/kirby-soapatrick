<?php /** @var \Kirby\Cms\Block $block */ ?>
<figure class="video-block">
  <?php if ($video = video($block->url(),[],['class' => 'w-full aspect-video'])): ?>
    <?php if(strpos($block->url(),'youtube')): ?>
      <?php $video_id = explode("=", $block->url()); ?>
      <lite-youtube videoid="<?= $video_id[1] ?>" posterquality="maxresdefault"></lite-youtube>
    <?php else: ?>
      <?= $video ?>
    <?php endif; ?>
  <?php else: ?>
    <video controls>
      <source src="<?= $block->video()->toFile()->url(); ?>" type="video/mp4">
    </video>
  <?php endif; ?>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>