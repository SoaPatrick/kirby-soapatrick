<?php /** @var \Kirby\Cms\Block $block */ ?>
<?php if ($video = video($block->url(),[],['class' => 'w-full aspect-video'])): ?>
<?php $isYoutube = strpos($block->url(),'youtube');?>

<figure class="video-block">
  <?php if($isYoutube): ?>
    <?php $video_id = explode("=", $block->url()); ?>
    <lite-youtube videoid="<?= $video_id[1] ?>" posterquality="maxresdefault"></lite-youtube>
  <?php else: ?>
    <?= $video ?>
  <?php endif; ?>
  <?php if ($block->caption()->isNotEmpty()): ?>
  <figcaption><?= $block->caption() ?></figcaption>
  <?php endif ?>
</figure>
<?php endif ?>